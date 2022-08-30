<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $id = $_POST['id'];
        $products = [];

        if(isset($_SESSION['basket'])) {
            foreach($_SESSION['basket'] as $b){
                array_push($products, $b);
            }
            $_SESSION['basket'] = [];
            $basketID = [];
            foreach($products as $p){
                array_push($basketID , $p->Product_ID);
            }
            if(in_array($id, $basketID)){
                foreach($products as $p){
                    if($id == $p->Product_ID){
                        $p->Quantity++;
                        $p->Total = $p->Quantity*$p->Product_UnitPrice;
                        break;
                    }
                }
                foreach($products as $p){
                    array_push($_SESSION['basket'], $p);
                }
                echo json_encode($_SESSION['basket']);
                http_response_code(200);
            }else{
                $prod = returnProduct($id);
                if ($prod) {
                    $prod->Quantity = 1;
                    $prod->Total = $prod->Quantity*$prod->Product_UnitPrice;
                    array_push($products, $prod);
                    foreach($products as $p){
                        array_push($_SESSION['basket'], $p);
                    }
                          
                    
                    echo json_encode($_SESSION['basket']);
                    http_response_code(200);
                } else {
                    http_response_code(500);
                }
            }
        
            
            
        }else{
            $prod = returnProduct($id);
            if ($prod) {
                $prod->Quantity = 1;
                $prod->Total = $prod->Quantity*$prod->Product_UnitPrice;
                array_push($products, $prod);
                $_SESSION['basket'] = $products;        
                
                echo json_encode($_SESSION['basket']);
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } 
        
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
