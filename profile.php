<?php
session_start();

include "pages/head.php";
include "models/functions.php";
include "config/connection.php";





//PREBACENI SVI PODACI O REGISTORVANOM KORISIKU PREKO SESIJE
// ZAVRSITI PROFILNU STRANICU KOJA JE DRUGACIJA ZA ADMINISTRATORA MODERATORA I KORISNIKA
//(PRVO URADITI ZA KORSINIKA JER JE ON LOGOVAN ONDA NAPRAVITI LOGOUT PA LOGOVANJE, UBACITI HARDKODOVANO U BAZU ADMINISTRATORA I MODERATORA I ONDA SA LOGOVANJEM PRAVITI NJIMA PROFIL I OSTALE STAVARI)
//POSLEDNJE PRAVITI ZA ADMINISTRATORA
?>
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

?>


    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TechShop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>

                </ul>

                <a class="nav-link" href="profile.php"><img src="<?= $user->User_Image ?>" alt="user profile img" id='pImg'></a>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="main-body">



            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?= $user->User_Image ?>" alt="User" class="rounded-circle" width="150">
                                <div class="mt-3 ">
                                    <h4><?= $user->User_Username ?></h4>
                                    <p class="text-secondary"><?= $user->Type_Name  ?></p>
                                    <button class="btn btn-outline-primary " id='btnLogout'>Log Out</button> <!-- LOGOUT -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body" id="userData">

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->User_FirstName ?> <?= $user->User_LastName ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->User_Email ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->User_Phone ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    $address = returnAddress($user->User_ID);
                                    if ($address) {
                                        $country = returnCountry($address->Country_ID);

                                    ?>

                                        <?= $country->country_name ?>, <?= $address->Address_City ?>, <?= $address->Address_Street ?> <?= $address->Address_Number ?>
                                    <?php
                                    } else {
                                    ?>
                                        No address
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-outline-primary" id="btnEdit" data-user="<?= $user->User_ID ?>">Edit</a>

                                </div>


                            </div>

                        </div>
                    </div>





                </div>
            </div>

        </div>
    </div>
    <?php
    if ($user->Type_ID == 3) {


    ?>
        <?php
        //$orders = retunrOrders($User->User_ID); FUNCKIJA KOJA VRACA SVE PROIZVODE KOJE JE KORISNIK KUPIO 
        //NAPRAVITI FUNKCIJU KOJA VRACA SVE ODRDE IDJEVE I ONDA TO PUSTITI KROZ PETLJU I ZA SVAKI ORDER ID IZVUCI STAVKE

        /* $orders = retunrOrders($user->User_ID);
                        var_dump($orders); */

        ?>

        

        <div class="container mydiv">
        <h3 class="display-5">Purchased products</h3>
            <div class="row" id = "purchasedProducts">
                <?php
                    $productsPur = purchasedProducts($user->User_ID);
                    //var_dump($productsPur);
                    foreach($productsPur as $p){
                ?>
                        <div class="col-md-3 my-3">
                            <!-- bbb_deals -->
                            <div class="bbb_deals">
                                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small><?=$p->Quantity?></span></div>
                                <?php
                                $dateTime = $p->Order_Date;
                                $dateTimeArr = explode(" ", $dateTime);
                                $dateArr = explode("-", $dateTimeArr[0]);
                                $timeArr = explode(":", $dateTimeArr[1]);
                                $date = $dateArr[1]."/".$dateArr[2]."/".$dateArr[0]." ".$timeArr[0].":".$timeArr[1];
                                ?>

                                
                                <div class="bbb_deals_title"><?=$date?></div>
                                <div class="bbb_deals_slider_container">
                                    <div class=" bbb_deals_item">
                                        <div class="bbb_deals_image"><img src="<?=$p->Image_Url?>" alt="<?=$p->Product_Name?>"></div>
                                        <div class="bbb_deals_content">
                                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                <div class="bbb_deals_item_category"><?=$p->Category_Name?></div>
                                            </div> 
                                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                <div class="bbb_deals_item_name"><?=$p->Product_Name?></div>
                                                
                                            </div>
                                            <div class="bbb_deals_item_price ml-auto">$<?=$p->Current_UnitPrice?>.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`
                <?php
                    }
                ?>

            </div>
        </div>



    <?php
    } else if ($user->Type_ID == 2) {
    ?>




        <?php
        $_SESSION['blockusers'] = returnBlockID();
        $busers = returnAll("blocked_users");
        $busersID = [];
        foreach ($busers as $b) {
            array_push($busersID, $b->User_ID);
        }
        $categories = returnAll("categories");
        $brands = returnAll("brands");

        $_SESSION['categories'] = $categories;
        $_SESSION['brands'] = $brands;

        ?>
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-add-product-tab" data-bs-toggle="tab" data-bs-target="#nav-add-product" type="button" role="tab" aria-controls="nav-add-product" aria-selected="true">Add</button>
                    <button class="nav-link" id="nav-products-tab" data-bs-toggle="tab" data-bs-target="#nav-products" type="button" role="tab" aria-controls="nav-products" aria-selected="false">Products</button>



                </div>

            </nav>

            <div class="tab-content" id="nav-tabContent">
                <!-- add -->
                <div class="tab-pane fade show active" id="nav-add-product" role="tabpanel" aria-labelledby="nav-add-product-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h1 class="display-6">Products</h1>
                                </div>
                                <div class="">
                                    <form action="">
                                        <label for="">Product Name</label>
                                        <input type="text" class="form-control" id="tbProductName" aria-describedby="basic-addon1">
                                        <div id="errorProdName" class="invalid-feedback">
                                            Wrong product name entered.
                                        </div>
                                        <label for="" class="mt-1">Unit Price</label>
                                        <input type="number" class="form-control" id="tbUnitPrice" aria-describedby="basic-addon1">
                                        <div id="errorUnitPrice" class="invalid-feedback">
                                            Wrong unit price name entered.
                                        </div>
                                        <label for="" class="mt-1">Description</label>
                                        <textarea class="form-control" id="taDescription" rows="3"></textarea>
                                        <div id="errorDescription" class="invalid-feedback">
                                            Enter description.
                                        </div>
                                        <label for="" class="mt-1">Units In Stock</label>
                                        <input type="number" class="form-control" id="tbUnits" aria-describedby="basic-addon1">
                                        <div id="errorUnits" class="invalid-feedback">
                                            Wrong units entered.
                                        </div>

                                        <label for="" class="mt-1">Activity</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="1" type="radio" name="rbactivity" id="rbactivity1" checked>
                                            <label class="form-check-label" for="rbactivity1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="0" type="radio" name="rbactivity" id="rbactivity2">
                                            <label class="form-check-label" for="rbactivity2">
                                                No
                                            </label>
                                        </div>
                                        <div id="errorActive" class="invalid-feedback">
                                            Enter activity.
                                        </div>
                                        <label for="" class="mt-1">Choose Category</label>
                                        <select class="form-select" id="ddlCat" aria-label="Default select example">
                                            <option value="0" selected>Choose</option>
                                            <?php
                                            foreach ($categories as $c) {
                                            ?>
                                                <option value="<?= $c->Category_ID ?>"><?= $c->Category_Name ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                        <div id="errorCat" class="invalid-feedback">
                                            Choose Brand.
                                        </div>
                                        <label for="" class="mt-1">Choose Brand</label>
                                        <select class="form-select" id="ddlBrand" aria-label="Default select example">
                                            <option value="0" selected>Choose</option>
                                            <?php
                                            foreach ($brands as $b) {
                                            ?>
                                                <option value="<?= $b->Brand_ID ?>"><?= $b->Brand_Name ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                        <div id="errorBrand" class="invalid-feedback">
                                            Choose Brand.
                                        </div>

                                        <div class="form-group my-1">
                                            <div class="row">
                                                <div class="" id="imgProdE">
                                                    <label for="formFile" class="form-label">Add Image</label>
                                                    <input class="form-control" id="imgProd" type="file" name="formFile">

                                                </div>
                                            </div>
                                        </div>
                                        <div id="errorImg" class="invalid-feedback ">
                                            Wrong Image.
                                        </div>


                                        <input type="button" class="btn btn-primary mt-3" id="btnProduct" value="Confirm">
                                        <div class="alert alert-success mt-3" style="display: none;" id="success" role="alert">
                                            Successful entry!
                                        </div>

                                    </form>
                                </div>


                                <div class="mt-5">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h1 class="display-6 md-4">Category</h1>



                                    <div class="">
                                        <form action="">
                                            <label for="">Category Name</label>
                                            <input type="text" class="form-control" id="tbCategoryName" aria-describedby="basic-addon1">
                                            <div id="errorCatName" class="invalid-feedback">
                                                Wrong category name entered.
                                            </div>
                                            <input type="button" class="btn btn-primary mt-1" id="btnCategory" value="Confirm">

                                            <div class="alert alert-success mt-3" style="display: none;" id="success" role="alert">
                                                Successful entry!
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="">
                                    <h1 class="display-6">Brand</h1>
                                </div>
                                <div class="">
                                    <form action="">
                                        <label for="">Brand Name</label>
                                        <input type="text" class="form-control" id="tbBrandName" aria-describedby="basic-addon1">
                                        <div id="errorBrandName" class="invalid-feedback">
                                            Wrong brand name entered.
                                        </div>
                                        <input type="button" class="btn btn-primary mt-1" id="btnBrand" value="Confirm">
                                        <div class="alert alert-success mt-3" style="display: none;" id="success" role="alert">
                                            Successful entry!
                                        </div>

                                    </form>
                                </div>


                            </div>

                        </div>
                        <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                        </div>

                    </div>


                </div>
                <!-- //add -->
                <!-- products -->
                <div class="tab-pane fade" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab">
                    <table class="table mt-4">
                        <thead class="table-dark">

                            <tr>
                                <td class="col-md-1">Number</td>
                                <td class="col-md-1">Product ID</td>
                                <td>Product Name</td>

                                <td>Activity</td>
                                <td>Category</td>
                                <td>Brand</td>
                                <td>Quantity</button></td>
                                <td></td>
                            </tr>


                        </thead>
                        <?php
                        $prodPag = returnProductsPag();
                        $num = 1;
                        ?>
                        <tbody id="products">
                            <?php


                            foreach ($prodPag as $p) {
                                if ($p->Product_Activity == 1) {
                                    if ($p->Product_UnitsInStock == 0) {



                            ?>
                                        <tr class="bg-warning">
                                            <td class="col-md-1"><?= $num ?></td>
                                            <td class="col-md-1"><?= $p->Product_ID ?></td>
                                            <td><?= $p->Product_Name ?></td>

                                            <td>Active</td>
                                            <td><?= $p->Category_Name ?></td>
                                            <td><?= $p->Brand_Name  ?></td>
                                            <td class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="<?= $p->Product_ID ?>" value="<?= $p->Product_UnitsInStock ?>" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary changeQ" data-id="<?= $p->Product_ID ?>" type="button">Change</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-md-1"><button type="button" data-id="<?= $p->Product_ID ?>" class=" changeA btn btn-outline-secondary">Deactivate</button></td>
                                        </tr>
                                    <?php
                                    } else {

                                    ?>
                                        <tr>
                                            <td class="col-md-1"><?= $num ?></td>
                                            <td class="col-md-1"><?= $p->Product_ID ?></td>
                                            <td><?= $p->Product_Name ?></td>

                                            <td>Active</td>
                                            <td><?= $p->Category_Name ?></td>
                                            <td><?= $p->Brand_Name  ?></td>
                                            <td class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="<?= $p->Product_ID ?>" value="<?= $p->Product_UnitsInStock ?>" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary changeQ" data-id="<?= $p->Product_ID ?>" type="button">Change</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-md-1"><button type="button" data-id="<?= $p->Product_ID ?>" class=" changeA btn btn-outline-secondary">Deactivate</button></td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                <?php
                                } else {


                                ?>

                                    <tr class='bg-danger'>
                                        <td class="col-md-1"><?= $num ?></td>
                                        <td class="col-md-1"><?= $p->Product_ID ?></td>
                                        <td><?= $p->Product_Name ?></td>

                                        <td>Not Active</td>
                                        <td><?= $p->Category_Name ?></td>
                                        <td><?= $p->Brand_Name  ?></td>
                                        <td class="col-md-2">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="<?= $p->Product_ID ?>" value="<?= $p->Product_UnitsInStock ?>" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary changeQ" data-id="$<?= $p->Product_ID ?>" type="button">Change</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-1"><button type="button" data-id="$<?= $p->Product_ID ?>" class=" changeA btn btn-outline-secondary">Activate</button></td>
                                    </tr>




                            <?php

                                }
                                $num++;
                            }
                            $numPages = returnPages();
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pagination" id="paginationPage">
                            <?php

                            for ($i = 0; $i < $numPages; $i++) {
                            ?>
                                <li class="page-item"><a data-page="<?= $i ?>" class="page-link moveProd" href="#"><?= $i + 1 ?></a></li>
                            <?php
                            }
                            ?>


                        </ul>
                    </nav>
                </div>

            </div>
        </div>

        <!-- //PISE SE PROFIL ZA MODERATORA -->

    <?php
    } else if ($user->Type_ID == 1) {





        $_SESSION['blockusers'] = returnBlockID();
        $busers = returnAll("blocked_users");
        $busersID = [];
        foreach ($busers as $b) {
            array_push($busersID, $b->User_ID);
        }
        $categories = returnAll("categories");
        $brands = returnAll("brands");

        $_SESSION['categories'] = $categories;
        $_SESSION['brands'] = $brands;

    ?>
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-add-product-tab" data-bs-toggle="tab" data-bs-target="#nav-add-product" type="button" role="tab" aria-controls="nav-add-product" aria-selected="true">Add</button>
                    <button class="nav-link" id="nav-products-tab" data-bs-toggle="tab" data-bs-target="#nav-products" type="button" role="tab" aria-controls="nav-products" aria-selected="false">Products</button>
                    <button class="nav-link" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="false">Users</button>
                    <button class="nav-link" id="block-user-tab" data-bs-toggle="tab" data-bs-target="#block-user" type="button" role="tab" aria-controls="block-user" aria-selected="false">Block User</button>
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Blocked Users Messages</button>


                </div>

            </nav>

            <div class="tab-content" id="nav-tabContent">
                <!-- add -->
                <div class="tab-pane fade show active" id="nav-add-product" role="tabpanel" aria-labelledby="nav-add-product-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h1 class="display-6">Products</h1>
                                </div>
                                <div class="">
                                    <form action="">
                                        <label for="">Product Name</label>
                                        <input type="text" class="form-control" id="tbProductName" aria-describedby="basic-addon1">
                                        <div id="errorProdName" class="invalid-feedback">
                                            Wrong product name entered.
                                        </div>
                                        <label for="" class="mt-1">Unit Price</label>
                                        <input type="number" class="form-control" id="tbUnitPrice" aria-describedby="basic-addon1">
                                        <div id="errorUnitPrice" class="invalid-feedback">
                                            Wrong unit price name entered.
                                        </div>
                                        <label for="" class="mt-1">Description</label>
                                        <textarea class="form-control" id="taDescription" rows="3"></textarea>
                                        <div id="errorDescription" class="invalid-feedback">
                                            Enter description.
                                        </div>
                                        <label for="" class="mt-1">Units In Stock</label>
                                        <input type="number" class="form-control" id="tbUnits" aria-describedby="basic-addon1">
                                        <div id="errorUnits" class="invalid-feedback">
                                            Wrong units entered.
                                        </div>

                                        <label for="" class="mt-1">Activity</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="1" type="radio" name="rbactivity" id="rbactivity1" checked>
                                            <label class="form-check-label" for="rbactivity1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="0" type="radio" name="rbactivity" id="rbactivity2">
                                            <label class="form-check-label" for="rbactivity2">
                                                No
                                            </label>
                                        </div>
                                        <div id="errorActive" class="invalid-feedback">
                                            Enter activity.
                                        </div>
                                        <label for="" class="mt-1">Choose Category</label>
                                        <select class="form-select" id="ddlCat" aria-label="Default select example">
                                            <option value="0" selected>Choose</option>
                                            <?php
                                            foreach ($categories as $c) {
                                            ?>
                                                <option value="<?= $c->Category_ID ?>"><?= $c->Category_Name ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                        <div id="errorCat" class="invalid-feedback">
                                            Choose Brand.
                                        </div>
                                        <label for="" class="mt-1">Choose Brand</label>
                                        <select class="form-select" id="ddlBrand" aria-label="Default select example">
                                            <option value="0" selected>Choose</option>
                                            <?php
                                            foreach ($brands as $b) {
                                            ?>
                                                <option value="<?= $b->Brand_ID ?>"><?= $b->Brand_Name ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                        <div id="errorBrand" class="invalid-feedback">
                                            Choose Brand.
                                        </div>

                                        <div class="form-group my-1">
                                            <div class="row">
                                                <div class="" id="imgProdE">
                                                    <label for="formFile" class="form-label">Add Image</label>
                                                    <input class="form-control" id="imgProd" type="file" name="formFile">

                                                </div>
                                            </div>
                                        </div>
                                        <div id="errorImg" class="invalid-feedback ">
                                            Choose Image.
                                        </div>


                                        <input type="button" class="btn btn-primary mt-3" id="btnProduct" value="Confirm">
                                        <div class="alert alert-success mt-3" style="display: none;" id="success" role="alert">
                                            Successful entry!
                                        </div>

                                    </form>
                                </div>


                                <div class="mt-5">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h1 class="display-6 md-4">Category</h1>



                                    <div class="">
                                        <form action="">
                                            <label for="">Category Name</label>
                                            <input type="text" class="form-control" id="tbCategoryName" aria-describedby="basic-addon1">
                                            <div id="errorCatName" class="invalid-feedback">
                                                Wrong category name entered.
                                            </div>
                                            <input type="button" class="btn btn-primary mt-1" id="btnCategory" value="Confirm">

                                            <div class="alert alert-success mt-3" style="display: none;" id="success" role="alert">
                                                Successful entry!
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="">
                                    <h1 class="display-6">Brand</h1>
                                </div>
                                <div class="">
                                    <form action="">
                                        <label for="">Brand Name</label>
                                        <input type="text" class="form-control" id="tbBrandName" aria-describedby="basic-addon1">
                                        <div id="errorBrandName" class="invalid-feedback">
                                            Wrong brand name entered.
                                        </div>
                                        <input type="button" class="btn btn-primary mt-1" id="btnBrand" value="Confirm">
                                        <div class="alert alert-success mt-3" style="display: none;" id="success" role="alert">
                                            Successful entry!
                                        </div>

                                    </form>
                                </div>


                            </div>

                        </div>
                        <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                        </div>

                    </div>


                </div>
                <!-- //add -->
                <!-- products -->
                <div class="tab-pane fade" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab">
                    <table class="table mt-4">
                        <thead class="table-dark">

                            <tr>
                                <td class="col-md-1">Number</td>
                                <td class="col-md-1">Product ID</td>
                                <td>Product Name</td>

                                <td>Activity</td>
                                <td>Category</td>
                                <td>Brand</td>
                                <td>Quantity</button></td>
                                <td></td>
                            </tr>


                        </thead>
                        <?php
                        $prodPag = returnProductsPag();
                        $num = 1;
                        ?>
                        <tbody id="products">
                            <?php


                            foreach ($prodPag as $p) {
                                if ($p->Product_Activity == 1) {
                                    if ($p->Product_UnitsInStock == 0) {



                            ?>
                                        <tr class="bg-warning">
                                            <td class="col-md-1"><?= $num ?></td>
                                            <td class="col-md-1"><?= $p->Product_ID ?></td>
                                            <td><?= $p->Product_Name ?></td>

                                            <td>Active</td>
                                            <td><?= $p->Category_Name ?></td>
                                            <td><?= $p->Brand_Name  ?></td>
                                            <td class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="<?= $p->Product_ID ?>" value="<?= $p->Product_UnitsInStock ?>" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary changeQ" data-id="<?= $p->Product_ID ?>" type="button">Change</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-md-1"><button type="button" data-id="<?= $p->Product_ID ?>" class=" changeA btn btn-outline-secondary">Deactivate</button></td>
                                        </tr>
                                    <?php
                                    } else {

                                    ?>
                                        <tr>
                                            <td class="col-md-1"><?= $num ?></td>
                                            <td class="col-md-1"><?= $p->Product_ID ?></td>
                                            <td><?= $p->Product_Name ?></td>

                                            <td>Active</td>
                                            <td><?= $p->Category_Name ?></td>
                                            <td><?= $p->Brand_Name  ?></td>
                                            <td class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="<?= $p->Product_ID ?>" value="<?= $p->Product_UnitsInStock ?>" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary changeQ" data-id="<?= $p->Product_ID ?>" type="button">Change</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-md-1"><button type="button" data-id="<?= $p->Product_ID ?>" class=" changeA btn btn-outline-secondary">Deactivate</button></td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                <?php
                                } else {


                                ?>

                                    <tr class='bg-danger'>
                                        <td class="col-md-1"><?= $num ?></td>
                                        <td class="col-md-1"><?= $p->Product_ID ?></td>
                                        <td><?= $p->Product_Name ?></td>

                                        <td>Not Active</td>
                                        <td><?= $p->Category_Name ?></td>
                                        <td><?= $p->Brand_Name  ?></td>
                                        <td class="col-md-2">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="<?= $p->Product_ID ?>" value="<?= $p->Product_UnitsInStock ?>" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary changeQ" data-id="$<?= $p->Product_ID ?>" type="button">Change</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-1"><button type="button" data-id="$<?= $p->Product_ID ?>" class=" changeA btn btn-outline-secondary">Activate</button></td>
                                    </tr>




                            <?php

                                }
                                $num++;
                            }
                            $numPages = returnPages();
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pagination" id="paginationPage">
                            <?php

                            for ($i = 0; $i < $numPages; $i++) {
                            ?>
                                <li class="page-item"><a data-page="<?= $i ?>" class="page-link moveProd" href="#"><?= $i + 1 ?></a></li>
                            <?php
                            }
                            ?>


                        </ul>
                    </nav>
                </div>
                <!-- users -->
                <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                    <table class="table mt-4">
                        <thead class="table-dark">

                            <tr>
                                <td class="col-md-1">Number</td>
                                <td class="col-md-1">User ID</td>
                                <td>User Name</td>
                                <td>User Username</td>
                                <td>User Email</td>
                                <td>Phone</td>
                            </tr>


                        </thead>
                        <tbody id="users">
                            <?php
                            $users = $_SESSION['users'];
                            $i = 1;
                            foreach ($users as $u) {
                                if (in_array($u->User_ID,  $busersID)) {
                            ?>
                                    <tr>
                                        <td class='col-md-1 text-danger'><?= $i ?>.</td>
                                        <td class='col-md-1 text-danger'><?= $u->User_ID  ?></td>
                                        <td class="text-danger"><?= $u->User_FirstName ?> <?= $u->User_LastName ?></td>
                                        <td class="text-danger"><?= $u->User_Username ?></td>
                                        <td class="text-danger"><?= $u->User_Email ?></td>
                                        <td class="text-danger"><?= $u->User_Phone  ?></td>
                                    </tr>
                                <?php
                                } else {

                                ?>
                                    <tr>
                                        <td class="col-md-1 "><?= $i ?>.</td>
                                        <td class="col-md-1"><?= $u->User_ID  ?></td>
                                        <td><?= $u->User_FirstName ?> <?= $u->User_LastName ?></td>
                                        <td><?= $u->User_Username ?></td>
                                        <td><?= $u->User_Email ?></td>
                                        <td><?= $u->User_Phone  ?></td>
                                    </tr>
                            <?php
                                }
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- block users -->
                <div class="tab-pane fade" id="block-user" role="tabpanel" aria-labelledby="block-user-tab">
                    <div class="container ">
                        <div class="row ">
                            <h1 class="display-4">Block User</h1>
                            <form action="models/block.php" method="post">
                                <label for="">Choose User</label>
                                <select id="ddlUser" name="ddlUser" class="form-select mb-3" aria-label="Default select example">
                                    <option value="0" selected>Choose</option>
                                    <?php
                                    $users = $_SESSION['users'];
                                    foreach ($users as $u) {
                                    ?>
                                        <option value="<?= $u->User_ID ?>">ID:<?= $u->User_ID ?> - Username: <?= $u->User_Username ?> - Email: <?= $u->User_Email ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                                <div id="errorUser" class="invalid-feedback">
                                    Please choose user.
                                </div>


                                <div class="mb-3">
                                    <label for="">Reason for blocking</label>
                                    <textarea class="form-control" name="taReason" id="taReason" rows="3"></textarea>
                                </div>
                                <div id="errorReason" class="invalid-feedback">
                                    Please enter a reason.
                                </div>
                                <button type="button" name="btnBlockUser" id="btnBlockUser" class="btn btn-outline-primary col-md-2">Block</button>
                            </form>
                            <div class="alert alert-success" style="display: none;" id="success" role="alert">
                                Blocking succeeded!
                            </div>
                            <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                            </div>

                        </div>
                    </div>
                </div>
                <!-- block users mess -->
                <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                    <table class="table mt-4">
                        <thead class="table-dark">

                            <tr>
                                <td class="col-md-1">Number</td>
                                <td class="col-md-1">User ID</td>
                                <td>User Username</td>
                                <td>Block Date</td>
                                <td>Reason</td>
                                <td>Message</td>
                                <td class="col-md-1">
                                </td>

                            </tr>


                        </thead>
                        <tbody id="blockedUsers">
                            <?php
                            $messages = $_SESSION["blockusers"];
                            $i = 1;
                            foreach ($messages as $b) {

                            ?>
                                <tr>
                                    <td class="col-md-1"><?= $i ?>.</td>
                                    <td class="col-md-1"><?= $b->User_ID ?></td>
                                    <td><?= $b->User_Username ?></td>
                                    <td><?= $b->Block_Date ?></td>
                                    <td><?= $b->Block_Reason ?></td>
                                    <td><?= $b->Message_Text ?></td>
                                    <td class="col-md-1">
                                        <button onclick=unblock(<?= $b->User_ID ?>) type="button" class="btn btn-dark">Unblock</button>


                                    </td>

                                </tr>
                            <?php

                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- //PISE SE PROFIL ZA ADMINISTRATORA -->


<?php
    }
}
?>

<?php
$pr = 5;
$errors = [];
if (isset($_SESSION['error-size'])) {
    array_push($errors, $_SESSION['error-size']);
}
if (isset($_SESSION['error-type'])) {
    array_push($errors, $_SESSION['error-type']);
}
if (isset($_SESSION['error-file'])) {
    array_push($errors, $_SESSION['error-file']);
}


if (count($errors) != 0) {
    $err = implode(", ", $errors);
    echo '<script>alert("' . $err . '")</script>';
    unset($_SESSION['error-file']);
    unset($_SESSION['error-size']);
    unset($_SESSION['error-type']);
}
?>

<?php
//var_dump($_SESSION['user']);
//var_dump($_SESSION['products']);
//var_dump($_SESSION['users']);
//var_dump($_SESSION['brands']);
//var_dump($_SESSION['categories']);
//var_dump($prodPag);
include "pages/footer.php";
?>