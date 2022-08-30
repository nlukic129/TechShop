<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        
        $error = 0;
        

        if($quantity == "" || $quantity <=0){
            $error++;
        }

        if($error == 0){
            $products = [];
            foreach($_SESSION['basket'] as $b){
                array_push($products, $b);
            }
            $_SESSION['basket']=[];
    
            foreach($products as $p){
                if($p->Product_ID == $id){
                    $p->Quantity = $quantity;
                    $p->Total = $p->Quantity*$p->Product_UnitPrice;
                    
                }
                array_push($_SESSION['basket'],$p);
            }

            echo json_encode($_SESSION['basket']);
            http_response_code(200);
        }else{
            echo json_encode("error");
            http_response_code(422);
        }
        
        

        
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
