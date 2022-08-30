<?php


session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";



    try {
        $typeOfUser = 3;      // Treba da se naprave po jedan nalog za administratora i moderatora
        $userImage = "images/userimage/user.jpg";

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $country = isset($_POST['country']) ? $_POST['country'] : "";
        $regexPhone = '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{3,4}$/';
        $regexName = "/^[a-z ,.'-]+$/i";
        $regexUsername = '/^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/';
        $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        $regexPass = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

        $regexCity = "/^[a-zA-Z',.\s+]{1,25}$/";
        $regexZipCode = "/(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/";
        $regexStreetName = "/^[a-z ,.'-]+$/i";
        $regexStreetNumber = "/(\b.*\d+.*?\b)/";

        $dbUsers = returnAll("users");
        $dbemails = [];
        $dbPhone = [];
        $dbusernames = [];
        foreach ($dbUsers as $dbuser) {
            array_push($dbemails, $dbuser->User_Email);
            array_push($dbusernames, $dbuser->User_Username);
            array_push($dbPhone, $dbuser->User_Phone);
        }

        $error = [];
        if (!preg_match($regexName, $firstName)) {

            array_push($error, "Wrong first name entered.");
        }
        if (!preg_match($regexName, $lastName)) {

            array_push($error, "Wrong last name entered.");
        }

        if (!in_array($email, $dbemails)) {

            if (!preg_match($regexEmail, $email)) {

                array_push($error, "Wrong email entered.");
            }
        } else {

            array_push($error, "A user with this email already exists.");
        }

        if (!in_array($phone, $dbPhone)) {

            if (!preg_match($regexPhone, $phone)) {
                array_push($error, "Wrong phone entered.");
            }
        } else {

            array_push($error, "A user with this phone already exists.");
        }

        if (!in_array($username, $dbusernames)) {
            if (!preg_match($regexUsername, $username)) {

                array_push($error, "Wrong username entered.");
            }
        } else {

            array_push($error, "A user with this username already exists.");
        }

        if (!preg_match($regexPass, $password)) {

            array_push($error, "Wrong password entered.");
        }
        if ($country != "") {
            $city = $_POST['city'];
            $zipCode = $_POST['zipCode'];
            $streetName = $_POST['streetName'];
            $streetNumber = $_POST['streetNumber'];


            if (!preg_match($regexCity, $city)) {

                array_push($error, "Wrong city name entered.");
            }
            if (!preg_match($regexZipCode, $zipCode)) {

                array_push($error, "Wrong zip code entered.");
            }
            if (!preg_match($regexStreetName, $streetName)) {

                array_push($error, "Wrong street name entered.");
            }
            if (!preg_match($regexStreetNumber, $streetNumber)) {

                array_push($error, "Wrong street number entered.");
            }
        }

        if (count($error) == 0) {
            $encryptedPass = md5($password);

            $userEntry = userEntry($firstName, $lastName, $username, $email, $encryptedPass, $userImage, $typeOfUser, $phone);
            $userO = returnUser($username);
            if ($userEntry) {

                if ($country != "" && $country != 0) {


                    $idUser = $userO->User_ID;

                    $addressEntry = addressEntry($city, $zipCode, $streetName, $streetNumber, $country, $idUser);


                    if (!$addressEntry) {

                        array_push($error, "Not success address.");
                        echo json_encode($error);
                        http_response_code(500);
                    }
                }
                $answer = 1;
                echo json_encode($answer);
                http_response_code(201);
                $_SESSION['user'] = $userO;
            } else {

                array_push($error, "Not success entry.");
                echo json_encode($error);
                http_response_code(500);
            }
        } else {
            echo json_encode($error);
            http_response_code(422);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
