<?php
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../config/connection.php";
    include "functions.php";

    try {

        $limit = $_POST['page'];
        $idCat = $_POST['idCat'];
        $idBrand = $_POST['idBrand'];

        if ($idCat == 0 && $idBrand == 0) {
            $numPages = returnPages();
            $prod = returnProductsPagShop($limit);

            echo json_encode(["pages" => $numPages, "prod" => $prod]);
            http_response_code(200);
        }
        if ($idCat != 0 && $idBrand != 0) {
            $numProd = retunrNumOfProdCB($idCat, $idBrand);
            $numPages = returnPagesCB($numProd->num);
            $prod = returnProductsPagShopCB($idCat, $idBrand, $limit);

            echo json_encode(["pages" => $numPages, "prod" => $prod]);
            http_response_code(200);
        }
        if ($idCat != 0 && $idBrand == 0) {
            $numProd = retunrNumOfProdC($idCat);

            $numPages = returnPagesC($numProd->num);
            $prod = returnProductsPagShopC($idCat, $limit);

            echo json_encode(["pages" => $numPages, "prod" => $prod]);
            http_response_code(200);
        }
        if ($idCat == 0 && $idBrand != 0) {
            $numProd = retunrNumOfProdB($idBrand);
            $numPages = returnPagesB($numProd->num);
            $prod = returnProductsPagShopB($idBrand, $limit);

            echo json_encode(["pages" => $numPages, "prod" => $prod]);
            http_response_code(200);
        }
    } catch (PDOException $exception) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
