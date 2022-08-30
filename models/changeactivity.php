<?php
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {

        $id = $_POST['id'];
        $product = returnProduct($id);
        var_dump($product);

        if ($product->Product_Activity == 1) {
            $activ = 0;
            $acitivity = activity($id, $activ);
            if ($acitivity) {
                http_response_code(204);
            } else {
                http_response_code(500);
            }
        } else {
            $activ = 1;
            $acitivity = activity($id, $activ);
            if ($acitivity) {
                http_response_code(204);
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
