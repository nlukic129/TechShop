<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {

        $id = $_POST['userid'];
        $unblock = dellete("blocked_users", "User_ID", $id);
        $delMess = dellete("messages", "User_ID", $id);
        if ($unblock && $delMess) {
            echo json_encode(returnBlockID());
        } else {
            http_response_code(500);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
