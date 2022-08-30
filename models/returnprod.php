<?php
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $prodPag = returnProductsPag();

        echo json_encode($prodPag);
        http_response_code(200);
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
