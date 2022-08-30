<?php
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {

        $limit = $_POST['page'];

        $numPages = returnPages();
        $prod = returnProductsPagShop($limit);

        echo json_encode(["pages" => $numPages, "prod" => $prod]);
        http_response_code(200);
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
