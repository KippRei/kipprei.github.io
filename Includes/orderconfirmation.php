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
                $transId = $_REQUEST["transactionId"];
                $checkoutId = $_REQUEST["checkoutId"];
                $url = curl_init("https://connect.squareupsandbox.com/v2/orders/$transId");
                curl_setopt($url, CURLOPT_HTTPHEADER, ['Square-Version: 2021-03-17',
                                                        'Authorization: Bearer '.$access_token,
                                                        'Content-Type: application/json']);
                curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                $return = curl_exec($url);
                $transData = json_decode($return, $associative=true);
                foreach ($transData['order']['line_items'] as $i)
                {
                    if ($i['name'] != 'Flat Rate Shipping')
                    {
                        echo $i['name'];
                        echo $i['quantity'];
                    }
                }
        ?>
    </body>
</html>