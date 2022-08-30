<?php


session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $CategoryName = $_POST['CategoryName'];
        $regexCatName = "/^[a-zA-Z',.\s+]{1,25}$/";
        $categories = returnAll("categories");
        $catNames = [];
        foreach ($categories as $c) {
            array_push($catNames, $c->Category_Name);
        }

        $errors = [];
        if (!preg_match($regexCatName, $CategoryName)) {

            array_push($errors, "Wrong category Name entered.");
        }

        if (in_array($CategoryName, $catNames)) {
            array_push($errors, "A category with that name already exists.");
        }

        if (count($errors) == 0) {

            $categoryEntry = categoryEntry($CategoryName);
            if ($categoryEntry) {
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
