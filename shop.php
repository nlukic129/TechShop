<?php
include "pages/head.php";
include "config/connection.php";
include "models/functions.php";
session_start();
//var_dump($_SESSION['products']);
//var_dump($_SESSION['brands']);
//var_dump($_SESSION['categories'])
//unset($_SESSION['basket']);

$brands = $_SESSION['brands'];
$categories = $_SESSION['categories'];
$products = $_SESSION['products'];
?>

<body>

    <nav class="mb-5 navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">TechShop</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="shop.php">Shop</a>
                    </li>

                </ul>
                <div id="basket" class=" mx-auto">
                <?php 
                if(isset($_SESSION['basket']) && count($_SESSION['basket']) != 0){  
                ?>
                    
                    <button type="button" class="btn btn-outline-danger position-relative" id="btnBasket">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                    </button>
                <?php
                }else{
                ?>
                    <button type="button" class="btn btn-outline-secondary" id="btnBasket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                <?php 
                }
                ?> 
                </div>
                
   


                <?php
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                ?>

                    <a class="nav-link" href="profile.php"><img src="<?= $user->User_Image ?>" alt="user profile img" id='pImg'></a>


                <?php
                } else {
                ?>

                    <a class="nav-link" href="login.php">Login</a>
                <?php
                }
                ?>

            </div>

        </div>

    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="mx-auto col-dm-12">
                <h1 class="display-6">Shop here</h1>
            </div>
        </div>
    </div>
    

    <div class="container">
        <div class="row">

            <div class="col-3 form-floating">
                <select id="ddlCategoryShop" class="form-select ddlShop" id="floatingSelect" aria-label="Floating label select example">
                    <option value="0" selected>Choose...</option>
                    <?php
                    foreach ($categories as $c) {
                    ?>
                        <option value="<?= $c->Category_ID ?>"><?= $c->Category_Name ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="floatingSelect ">Category</label>
            </div>
            <div class="col-3 form-floating">
                <select id="ddlBrandShop" class="form-select ddlShop" id="floatingSelect" aria-label="Floating label select example">
                    <option value="0" selected>Choose...</option>
                    <?php
                    foreach ($brands as $b) {
                    ?>
                        <option value="<?= $b->Brand_ID ?>"><?= $b->Brand_Name ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="floatingSelect">Brand</label>
            </div>


        </div>
    </div>
    <hr>

    <?php
    $prodPag = returnProductsPagShop();
    $num = 1;
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container mydiv">
                    <div id="produstsShop" class="row">


                        <?php
                        if (count($prodPag) > 0) {
                            foreach ($prodPag as $p) {
                                if ($p->Product_Activity == 1 && $p->Product_UnitsInStock > 0) {

                        ?>


                                    <div class="col-md-3 my-3">

                                        <!-- bbb_deals -->
                                        <div class="bbb_deals">
                                            <div class="bbb_deals_title"><?= $p->Product_Name ?></div>
                                            <div class="bbb_deals_slider_container">
                                                <div class=" bbb_deals_item">
                                                    <a href="view.php?product=<?= $p->Product_ID ?>">
                                                        <div class="bbb_deals_image"><img src="<?= $p->Image_Url ?>" alt=""></div>
                                                    </a>
                                                    <div class="bbb_deals_content">
                                                        <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                            <div class="bbb_deals_item_category"><?= $p->Category_Name ?></div>

                                                        </div>
                                                        <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                            <div class="bbb_deals_item_price ml-auto">$<?= $p->Product_UnitPrice ?>.00</div>
                                                        </div>
                                                        <div class="available">
                                                            <div class="available_line d-flex flex-row justify-content-start">
                                                                <div class="available_title">Available: <span><?= $p->Product_UnitsInStock ?></span></div>

                                                            </div>
                                                            <div class="available_bar"><span style="width:17%"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php

                                            if (isset($_SESSION['user'])) {

                                                if ($user->Type_ID == 3) {


                                            ?>
                                                    <button type="button" data-product="<?= $p->Product_ID ?>" class="buy btn btn-outline-secondary">Add to card</button>

                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <button type="button" onclick="goLogin()" data-product="<?= $p->Product_ID ?>" class="btn btn-outline-secondary">Add to card</button>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>


                            <?php

                                }
                            }
                        } else {

                            ?>
                            <p>No Products.</p>
                        <?php
                        }
                        ?>

                    </div>
                </div>

                <nav aria-label="..." class="">
                    <ul class="mx-auto pagination" id="paginationPage">
                        <?php
                        $numPages = returnPages();
                        for ($i = 0; $i < $numPages; $i++) {
                        ?>
                            <li class="page-item"><a data-page="<?= $i ?>" class="page-link moveProdShop" href="#"><?= $i + 1 ?></a></li>
                        <?php
                        }
                        ?>


                    </ul>
                </nav>
            </div>
        </div>
    </div>






</body>
<?php
include "pages/footer.php";
?>