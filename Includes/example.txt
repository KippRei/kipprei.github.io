$order_line_item_applied_tax = new \Square\Models\OrderLineItemAppliedTax('38ze1696-z1e3-5628-af6d-f1e04d947fg3');

$applied_taxes = [$order_line_item_applied_tax];
$order_line_item_applied_discount = new \Square\Models\OrderLineItemAppliedDiscount('56ae1696-z1e3-9328-af6d-f1e04d947gd4');

$applied_discounts = [$order_line_item_applied_discount];
$base_price_money = new \Square\Models\Money();
$base_price_money->setAmount(1500);
$base_price_money->setCurrency('USD');

$order_line_item = new \Square\Models\OrderLineItem('2');
$order_line_item->setName('Printed T Shirt');
$order_line_item->setAppliedTaxes($applied_taxes);
$order_line_item->setAppliedDiscounts($applied_discounts);
$order_line_item->setBasePriceMoney($base_price_money);

$base_price_money1 = new \Square\Models\Money();
$base_price_money1->setAmount(2500);
$base_price_money1->setCurrency('USD');

$order_line_item1 = new \Square\Models\OrderLineItem('1');
$order_line_item1->setName('Slim Jeans');
$order_line_item1->setBasePriceMoney($base_price_money1);

$base_price_money2 = new \Square\Models\Money();
$base_price_money2->setAmount(3500);
$base_price_money2->setCurrency('USD');

$order_line_item2 = new \Square\Models\OrderLineItem('3');
$order_line_item2->setName('Woven Sweater');
$order_line_item2->setBasePriceMoney($base_price_money2);

$line_items = [
    $order_line_item,
    $order_line_item1,
    $order_line_item2
];
$order_line_item_tax = new \Square\Models\OrderLineItemTax();
$order_line_item_tax->setUid('38ze1696-z1e3-5628-af6d-f1e04d947fg3');
$order_line_item_tax->setType('INCLUSIVE');
$order_line_item_tax->setPercentage('7.75');
$order_line_item_tax->setScope('LINE_ITEM');

$taxes = [$order_line_item_tax];
$amount_money = new \Square\Models\Money();
$amount_money->setAmount(100);
$amount_money->setCurrency('USD');

$order_line_item_discount = new \Square\Models\OrderLineItemDiscount();
$order_line_item_discount->setUid('56ae1696-z1e3-9328-af6d-f1e04d947gd4');
$order_line_item_discount->setType('FIXED_AMOUNT');
$order_line_item_discount->setAmountMoney($amount_money);
$order_line_item_discount->setScope('LINE_ITEM');

$discounts = [$order_line_item_discount];
$order1 = new \Square\Models\Order('location_id');
$order1->setReferenceId('reference_id');
$order1->setCustomerId('customer_id');
$order1->setLineItems($line_items);
$order1->setTaxes($taxes);
$order1->setDiscounts($discounts);

$order = new \Square\Models\CreateOrderRequest();
$order->setOrder($order1);
$order->setIdempotencyKey('12ae1696-z1e3-4328-af6d-f1e04d947gd4');

$pre_populate_shipping_address = new \Square\Models\Address();
$pre_populate_shipping_address->setAddressLine1('1455 Market St.');
$pre_populate_shipping_address->setAddressLine2('Suite 600');
$pre_populate_shipping_address->setLocality('San Francisco');
$pre_populate_shipping_address->setAdministrativeDistrictLevel1('CA');
$pre_populate_shipping_address->setPostalCode('94103');
$pre_populate_shipping_address->setCountry('US');
$pre_populate_shipping_address->setFirstName('Jane');
$pre_populate_shipping_address->setLastName('Doe');

$amount_money1 = new \Square\Models\Money();
$amount_money1->setAmount(60);
$amount_money1->setCurrency('USD');

$charge_request_additional_recipient = new \Square\Models\ChargeRequestAdditionalRecipient(
    '057P5VYJ4A5X1',
    'Application fees',
    $amount_money1
);

$additional_recipients = [$charge_request_additional_recipient];
$body = new \Square\Models\CreateCheckoutRequest('86ae1696-b1e3-4328-af6d-f1e04d947ad6', $order);
$body->setAskForShippingAddress(true);
$body->setMerchantSupportEmail('merchant+support@website.com');
$body->setPrePopulateBuyerEmail('example@email.com');
$body->setPrePopulateShippingAddress($pre_populate_shipping_address);
$body->setRedirectUrl('https://merchant.website.com/order-confirm');
$body->setAdditionalRecipients($additional_recipients);

$api_response = $client->getCheckoutApi()->createCheckout('location_id0', $body);

if ($api_response->isSuccess()) {
    $result = $api_response->getResult();
} else {
    $errors = $api_response->getErrors();
}