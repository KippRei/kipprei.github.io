<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="When Whales Walked! We are a 3 piece Pop-Punk band from Central California.">
    </head>

    <body class="home">
        <?php   
                include 'vendor/autoload.php';
                use Dotenv\Dotenv;

                // dotenv is used to read from the '.env' file created
                $dotenv = Dotenv::create(__DIR__);
                $dotenv->load();

                // Pulled from the .env file and upper cased e.g. SANDBOX, PRODUCTION.
                $upper_case_environment = strtoupper(getenv('ENVIRONMENT'));

                // Use the environment and the key name to get the appropriate values from the .env file.
                $access_token = getenv($upper_case_environment.'_ACCESS_TOKEN'); 
                $location_id = getenv($upper_case_environment.'_LOCATION_ID');
                
                try {
                $transId = $_REQUEST["transactionId"];
                $checkoutId = $_REQUEST["checkoutId"];


                // Get transaction details (i.e. items and quantity)
                $url = curl_init("https://connect.squareupsandbox.com/v2/orders/$transId");
                curl_setopt($url, CURLOPT_HTTPHEADER, ['Square-Version: 2021-03-17',
                                                        'Authorization: Bearer '.$access_token,
                                                        'Content-Type: application/json']);
                curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                $return = curl_exec($url);
                $transData = json_decode($return, $associative=true);
                if ($transData['errors'])
                {
                    throw new Exception('Order retrieval error');
                }
                
                foreach ($transData['order']['line_items'] as $i)
                {
                    echo "<div>$i[name]- $i[quantity]</div>";
                }
                

                // Get customer id to look up customer in next step
                $url = curl_init("https://connect.squareupsandbox.com/v2/locations/$location_id/transactions/$transId");
                curl_setopt($url, CURLOPT_HTTPHEADER, ['Square-Version: 2021-03-17',
                                                        'Authorization: Bearer '.$access_token,
                                                        'Content-Type: application/json']);
                curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                $return = curl_exec($url);
                $orderData = json_decode($return, $associative=true);
                if ($transData['errors'])
                {
                    throw new Exception('Order retrieval error');
                }

                $customerId = $orderData['transaction']['tenders'][0]['customer_id'];
                // echo "<div>Customer Id- $customerId</div>";
            

                // Lookup customer id to get customer contact info
                $url = curl_init("https://connect.squareupsandbox.com/v2/customers/$customerId");
                curl_setopt($url, CURLOPT_HTTPHEADER, ['Square-Version: 2021-03-17',
                                                        'Authorization: Bearer '.$access_token,
                                                        'Content-Type: application/json']);
                curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                $return = curl_exec($url);
                $custData = json_decode($return, $associative=true);
                if ($custData['errors'])
                {
                    throw new Exception('Order retrieval error');
                }
                $fName = $custData['customer']['given_name'];
                $lName = $custData['customer']['family_name'];
                $email = $custData['customer']['email_address'];
                // echo "<div>First Name- $fName</div>";
                // echo "<div>Last Name- $lName</div>";
                // echo "<div>Email- $email</div>";
                }

                catch (Exception $e) {
                    echo "<div>Redirecting to WhenWhalesWalked.com</div>
                          <script>window.location.href='https://kippreitzel.com'</script>";
                }
        ?>
    </body>
</html>