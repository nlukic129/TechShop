<?php
session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../config/connection.php";
    include "functions.php";

    try {
        $userId = $_POST['userId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $country = isset($_POST['country']) ? $_POST['country'] : "";
        $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : "";


        $regexPhone = '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{3,4}$/';
        $regexName = "/^[a-z ,.'-]+$/i";
        $regexPass = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

        $regexCity = "/^[a-zA-Z',.\s-]{1,25}$/";
        $regexZipCode = "/(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/";
        $regexStreetName = "/^[a-z ,.'-]+$/i";
        $regexStreetNumber = "/(\b.*\d+.*?\b)/";
        $user = $_SESSION["user"];

        $error = [];

        if (!preg_match($regexName, $firstName)) {

            array_push($error, "Wrong first name entered.");
        }
        if (!preg_match($regexName, $lastName)) {

            array_push($error, "Wrong last name entered.");
        }
        $phoneError = 0;
        if ($phone != $user->User_Phone) {
            if (!preg_match($regexPhone, $phone)) {
                array_push($error, "Wrong phone entered.");
                $phoneError++;
            }
            if ($phoneError == 0) {
                $phoneNumbers = [];
                $users = returnAll('users');
                foreach ($users as $u) {
                    array_push($phoneNumbers, $u->User_Phone);
                }

                if (in_array($phone, $phoneNumbers)) {
                    array_push($error, "The phone number already exists in the database.");
                }
            }
        }






        if ($newPassword != "") {
            $oldPassword = $_POST['oldPassword'];
            $encryptedOldPass = md5($oldPassword);
            $encryptedNewPass = md5($newPassword);

            if ($user->User_Password == $encryptedOldPass) {
                if (!preg_match($regexPass, $newPassword)) {

                    array_push($error, "Wrong new password entered.");
                }
            } else {
                array_push($error, "Wrong old password.");
            }
        }


        $userAdd = returnAddress($userId);
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
        } else {
            if ($userAdd) {
                array_push($error, "Deleting an address is not allowed. Only change is allowed.");
            }
        }




        if (count($error) == 0) {


            if ($userAdd) {
                $editAddres = editAddres($city, intval($zipCode), $streetName, intval($streetNumber), intval($country), intval($userId));
            } else {
                $editAddres = addressEntry($city, $zipCode, $streetName, $streetNumber, $country, $userId);
            }
            if ($newPassword != "") {

                $userEntry = editUser(intval($userId), $firstName, $lastName, $phone, $encryptedNewPass);
            } else {

                $userEntry = editUser(intval($userId), $firstName,  $lastName, $phone, $user->User_Password);
            }
            if ($userEntry && $editAddres) {
                $userO = returnUser($user->User_Username);
                $_SESSION['user'] = $userO;
                http_response_code(204);
            } else {
                array_push($error, "Error entering data into database.");
                http_response_code(500);
            }
        } else {
            echo json_encode($error);
            http_response_code(422);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
        echo json_encode($exception);
    }
} else {
    http_response_code(404);
}
