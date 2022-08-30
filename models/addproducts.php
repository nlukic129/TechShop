<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {
        $tbProductName = $_POST['tbProductName'];
        $tbUnitPrice = $_POST['tbUnitPrice'];
        $taDescription = $_POST['taDescription'];
        $tbUnits = $_POST['tbUnits'];
        $rbactivity = $_POST['rbactivity'];
        $ddlCat = $_POST['ddlCat'];
        $ddlBrand = $_POST['ddlBrand'];

        $imgProd = $_FILES['imgProd'];
        $fileName = $imgProd['name'];
        $tmpFile = $imgProd['tmp_name'];
        $fileSize = $imgProd['size'];
        $fileType = $imgProd['type'];
        $erroeFile = $imgProd['error'];
        $tfile = substr($fileType, 6);

        $regexPrice = '/^[0-9]([.][0-9])?$/';
        $regexUnit = '/\d+/';
        $aprovedTypes = ["image/jpg", "image/jpeg", "image/png"];


        $products = $_SESSION['products'];
        $pNames = [];
        if ($products) {

            foreach ($products as $p) {
                array_push($pNames, $p->Product_Name);
            }
        }



        $errors = [];
        if ($imgProd["full_path"] == "" || !in_array($fileType, $aprovedTypes) || $fileSize > 500000) {
            array_push($errors, "Wrong Image.");
        }

        if ($tbProductName == "" || in_array($tbProductName, $pNames)) {
            array_push($errors, "Enter a valid product name.");
        }
        if ($tbUnitPrice == "" && preg_match($regexPrice, $tbUnitPrice)) {
            array_push($errors, "Enter the unit price.");
        }
        if ($taDescription == "") {
            array_push($errors, "Enter the description.");
        }
        if ($tbUnits == "" && preg_match($regexUnit, $tbUnits)) {
            array_push($errors, "Enter the number units in stock.");
        }
        if ($rbactivity == "") {
            array_push($errors, "Enter the activity.");
        }
        if ($ddlCat == "") {
            array_push($errors, "Enter the category.");
        }
        if ($ddlBrand == "") {
            array_push($errors, "Enter the brand.");
        }

        if (count($errors) == 0) {

            $productsEntry = productsEntry($tbProductName, $tbUnitPrice, $taDescription, $tbUnits, $rbactivity, $ddlCat, $ddlBrand);

            if ($productsEntry) {
                $product = returnProductsName($tbProductName);
                $productID = $product->Product_ID;

                $newNameImg = time() . "_" . $productID;
                $path = "../images/productimage/" . $newNameImg . "." . $tfile;
                if (move_uploaded_file($tmpFile, $path)) {




                    $enterImg = enterImg(substr($path, 3), $productID);

                    if ($enterImg) {
                        $answer = ["Success."];
                        echo json_encode($answer);
                        http_response_code(201);
                    }
                }
            } else {

                $errors = ["Error entering database."];
                echo json_encode($errors);
                http_response_code(500);
            }
        } else {
            http_response_code(422);
            echo json_encode($errors);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
