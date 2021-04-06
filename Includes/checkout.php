<?php
session_start();
// Note this line needs to change if you don't use Composer:
// require('square-php-sdk/autoload.php');
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Square\Models\CreateOrderRequest;
use Square\Models\CreateCheckoutRequest;
use Square\Models\Order;
use Square\Models\OrderLineItem;
use Square\Models\Money;
use Square\Exceptions\ApiException;
use Square\SquareClient;

// dotenv is used to read from the '.env' file created
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// Pulled from the .env file and upper cased e.g. SANDBOX, PRODUCTION.
$upper_case_environment = strtoupper(getenv('ENVIRONMENT'));

// Use the environment and the key name to get the appropriate values from the .env file.
$access_token = getenv($upper_case_environment.'_ACCESS_TOKEN');    
$location_id =  getenv($upper_case_environment.'_LOCATION_ID');

// Initialize the authorization for Square
$client = new SquareClient([
  'accessToken' => $access_token,
  'environment' => getenv('ENVIRONMENT')
]);

// make sure we actually are on a POST with an amount
// This example assumes the order information is retrieved and hard coded
// You can find different ways to retrieve order information and fill in the following lineItems object.

$cartTotal = $_POST["totalPrice"];

try {
  $checkout_api = $client->getCheckoutApi();

  // Monetary amounts are specified in the smallest unit of the applicable currency.
  // This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.

  $order_line_items = array();
  $merch = $_SESSION["merchPriceList"][0]; // gets the merch price list to calculate line item price
  $i = 0; // iterator for naming line item variables
  foreach ($_SESSION["cart"] as $item=>$quant)
  {
      $line_money = 'm'.$i;
      $line_item = 'i'.$i;
      $price = $merch[$item]['price'] * 100;

      $$line_money = new Money();
      $$line_money->setCurrency('USD');
      $$line_money->setAmount($price); // TODO: get line total, just used quantity as placeholder for now

      $$line_item= new OrderLineItem($quant);
      $$line_item->setName($merch[$item]['name']);
      $$line_item->setBasePriceMoney($$line_money);

      array_push($order_line_items, $$line_item);
      $i++;
  }
  $money_ship = new Money();
  $money_ship->setCurrency('USD');
  $money_ship->setAmount(420);
  
  $item_ship = new OrderLineItem(1);
  $item_ship->setName('Flat-Rate Shipping');
  $item_ship->setBasePriceMoney($money_ship);

  array_push($order_line_items, $item_ship);

  // Create a new order and add the line items as necessary.
  $order = new Order($location_id);
  $order->setLineItems($order_line_items);

  $create_order_request = new CreateOrderRequest();
  $create_order_request->setOrder($order);

  // Similar to payments you must have a unique idempotency key.
  $checkout_request = new CreateCheckoutRequest(uniqid(), $create_order_request);
  $checkout_request->setAskForShippingAddress(true);
  //$checkout_request->setMerchantSupportEmail('WhenWhalesWalked@gmail.com');
  $checkout_request->setRedirectUrl('https://kippreitzel.com');
  
  $response = $checkout_api->createCheckout($location_id, $checkout_request);
} catch (ApiException $e) {
  // If an error occurs, output the message
  echo 'Caught exception!<br/>';
  echo '<strong>Response body:</strong><br/>';
  echo '<pre>'; var_dump($e->getResponseBody()); echo '</pre>';
  echo '<br/><strong>Context:</strong><br/>';
  echo '<pre>'; var_dump($e->getContext()); echo '</pre>';
  exit();
}

// If there was an error with the request we will
// print them to the browser screen here
if ($response->isError()) {
  echo 'Api response has Errors';
  $errors = $response->getErrors();
  echo '<ul>';
  foreach ($errors as $error) {
      echo '<li>❌ ' . $error->getDetail() . '</li>';
  }
  echo '</ul>';
  exit();
}


// This redirects to the Square hosted checkout page
header('Location: '.$response->getResult()->getCheckout()->getCheckoutPageUrl());