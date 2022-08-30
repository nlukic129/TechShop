<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../config/connection.php";
    include "functions.php";

    try {
        $idUser = $_POST['idUser'];
        $i = $_POST['i'];
        if ($i == 1) {
            $user = returnUserId($idUser);
            $countries = returnAll("countries");
            $data = array('user' => $user, 'countries' => $countries);
            echo json_encode($data);
            http_response_code(200);
        } else {
            $user = returnUserIdNoAdd($idUser);
            $countries = returnAll("countries");
            $data = array('user' => $user, 'countries' => $countries);
            echo json_encode($data);
            http_response_code(200);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
