<?php
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $updateQuantity = updateQuantity($id, $quantity);

        if ($updateQuantity) {
            http_response_code(204);
        } else {
            http_response_code(500);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
