<?php


session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $BrandName = $_POST['BrandName'];
        $regexBrand = "/^[a-zA-Z',.\s+]{1,25}$/";
        $brands = returnAll("brands");
        $brandsNames = [];
        foreach ($brands as $c) {
            array_push($brandsNames, $c->Brand_Name);
        }

        $errors = [];
        if (!preg_match($regexBrand, $BrandName)) {

            array_push($errors, "Wrong brand Name entered.");
        }

        if (in_array($BrandName, $brandsNames)) {
            array_push($errors, "A brand with that name already exists.");
        }

        if (count($errors) == 0) {

            $BrandEntry = BrandEntry($BrandName);
            if ($BrandEntry) {
                http_response_code(201);
                echo json_encode("success");
            } else {
                http_response_code(500);
            }
        } else {
            echo json_encode($errors);
            http_response_code(422);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
