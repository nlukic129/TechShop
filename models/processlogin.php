<?php


session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";



    try {

        $username = $_POST['username'];
        $password = $_POST['password'];



        $regexUsername = '/^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/';
        $regexPass = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

        $errors = [];
        if (!preg_match($regexUsername, $username)) {

            array_push($errors, "Wrong username entered.");
        }
        if (!preg_match($regexPass, $password)) {

            array_push($errors, "Wrong password entered.");
        }


        $blocked_user = retunrBlockedUser($username);
        if ($blocked_user) {
            $bUser = $blocked_user->User_Username;
        } else {
            $bUser = "";
        }


        if ($bUser != $username) {
            $user = returnUser($username);
            if ($user) {
                $encryptedPass = md5($password);
                if ($encryptedPass == $user->User_Password) {
                    $answer = 1;
                    echo json_encode($answer);
                    http_response_code(201);
                    $_SESSION['user'] = $user;
                    if ($user->Type_ID != 3) {
                        $products = returnProducts();
                        if ($products) {
                            $_SESSION['products'] = $products;
                        }
                        if ($user->Type_ID == 1) {
                            $_SESSION['users'] = returnAll("users");
                        }
                    }
                } else {

                    array_push($errors, "Wrog password.");
                    http_response_code(422);
                    echo json_encode($errors);
                }
            } else {

                array_push($errors, "The user does not exist.");
                http_response_code(422);
                echo json_encode($errors);
            }
        } else {
            $blockArr = array('reason' => $blocked_user->Block_Reason, 'user' => $username);
            echo json_encode($blockArr);
            http_response_code(201);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
