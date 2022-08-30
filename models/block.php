<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";



    try {
        $error = [];
        $userid = $_POST['userid'];
        $reason = $_POST['reason'];
        $blockUsers = returnAll("blocked_users");
        $blockedID = [];
        foreach ($blockUsers as $b) {
            array_push($blockedID, $b->User_ID);
        }

        if ($userid != 0 && $reason != "") {
            if (!in_array($userid, $blockedID)) {
                $user = returnUserId($userid);
                $username = $user->User_Username;

                $blockUser = blockUser($userid, $username, $reason);
                if ($blockUser) {
                    http_response_code(201);
                    echo json_encode("Blocking succeeded");
                } else {
                    array_push($error, "Blocking failed.");
                    http_response_code(500);
                }
            } else {
                array_push($error, "User is already blocked.");
                http_response_code(422);
            }
        } else {
            array_push($error, "Please enter all information.");
            http_response_code(422);
        }

        echo json_encode($error);
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
