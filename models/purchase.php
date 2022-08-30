<?php


session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";



    try {

        $regexCity = "/^[a-zA-Z',.\s+]{1,25}$/";
        $regexZipCode = "/(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/";
        $regexStreetName = "/^[a-z ,.'-]+$/i";
        $regexStreetNumber = "/(\b.*\d+.*?\b)/";
        $error = [];
        $country = isset($_POST['country']) ? $_POST['country'] : "";
        $city = $_POST['city'];
        $zipCode = $_POST['zipCode'];
        $streetName = $_POST['streetName'];
        $streetNumber = $_POST['streetNumber'];
        $user = $_SESSION['user'];
        
        

            if ($country == "") {

                array_push($error, "Wrong country name entered.");
            }
            if (!preg_match($regexCity, $city)) {

                array_push($error, "Wrong city name entered.");
            }
            if (!preg_match($regexZipCode, $zipCode)) {

                array_push($error, "Wrong zip code entered.");
            }
            if (!preg_match($regexStreetName, $streetName)) {

                array_push($error, "Wrong street name entered.");
            }
            if (!preg_match($regexStreetNumber, $streetNumber)) {

                array_push($error, "Wrong street number entered.");
            }

            $products = $_SESSION['basket'];

            foreach($products as $p){
                $product = returnProduct($p->Product_ID );
                if($p->Quantity > $product->Product_UnitsInStock){
                    array_push($error, "There are not that many products in stock. (".$p->Product_Name.")");
                }
            }

        

        if (count($error) == 0) {
            $userA = returnUserId($user->User_ID);
            if(isset($userA->Address_City)){
                $addressEntry = editAddres($city, $zipCode, $streetName, $streetNumber, $country, $user->User_ID);
            }else{
                $addressEntry = addressEntry($city, $zipCode, $streetName, $streetNumber, $country, $user->User_ID);
            }
            
            if($addressEntry){
                
                $address = returnAddress($user->User_ID);                
                $ordersEntry = ordersEntry($address->Address_ID , $user->User_ID);
                
                if($ordersEntry){
                    $orderID = returnOrderID($user->User_ID);
                    $err = 0;
                    foreach($products as $p){
                        $uprateQuantity = updateQuantityBuy($p->Product_ID, $p->Quantity);
                        $oredrDetailsEnter = oredrDetailsEnter($orderID->ID, $p->Product_ID, $p->Product_UnitPrice, $p->Quantity);
                        if(!$oredrDetailsEnter){
                            $err++;
                        }
                    }
                    if($err == 0){
                        $purchasedProducts = $products;
                        unset($_SESSION['basket']);
                        echo json_encode($purchasedProducts);
                        http_response_code(200);
                    }
                    
                    
                
                }else{
                    array_push($error, "Not success entry.");
                    echo json_encode($error);
                    http_response_code(500);
                }
            }else{
                array_push($error, "Not success entry.");
                echo json_encode($error);
                http_response_code(500);
            }

           
            
        }


                
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
