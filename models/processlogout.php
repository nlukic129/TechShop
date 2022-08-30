<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        if (isset($_SESSION['basket'])) {
            unset($_SESSION['basket']);
        }
        http_response_code(201);
        echo json_encode(5);
    }
} else {
    http_response_code(404);
}
