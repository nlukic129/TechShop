<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {

        $id = $_POST['id'];
        
        $products = $_SESSION['basket'];
        $_SESSION['basket'] = [];

        foreach($products as $p){
            if($p->Product_ID != $id){
                array_push($_SESSION['basket'], $p);
            }
        }

        echo json_encode($_SESSION['basket']);
        http_response_code(200);
        
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}