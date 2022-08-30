<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";
    try {
        $username = $_POST['username'];
        $message = $_POST['message'];

        if ($message != "") {
            $user = returnUser($username);
            $userMessage = returnUserMessage($user->User_ID);
            $error = [];
            if (!$userMessage) {
                $insertMessage = insertMessage($user->User_ID, $message);
                if ($insertMessage) {
                    $answer = ["Message sent."];
                    echo json_encode($answer);
                    http_response_code(201);
                } else {
                    array_push($error, "Message not sent.");
                    echo json_encode($error);
                    http_response_code(500);
                }
            } else {

                array_push($error, "You have already sent a message.");

                echo json_encode($error);
                http_response_code(422);
            }
        } else {
            array_push($error, "The message must not be empty.");
            echo json_encode($error);
            http_response_code(422);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
