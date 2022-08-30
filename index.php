<!-- BOOTSTRAP 5 NAWS AND TABS SE NALAZI STA CE DA BUDE KOD ADMINISTRATORA I MODERATORA ISPISANO -->
<!-- BOOTSTRAP 5 OFFCANVAS KORPA KOJA CE DA IZLAZI SA STRANE DA SE VIDIS TA SE KUPUJE PRIVREMENO -->
<!-- BOOTSTRAP 5 BAGES OBAVESTENJA KOJA ISKACU KAD SE NESTO DODA U KORPU -->

<?php
include "pages/head.php";
include "models/functions.php";
include "config/connection.php";
session_start();
$_SESSION['brands'] = returnAll("brands");
$_SESSION['categories'] = returnAll("categories");
$_SESSION['products'] = returnProducts();
$categories = $_SESSION['categories'];
$products = returnProducts();

foreach($categories as $c){
        
    $product = [];
    foreach($products as $p){
        //var_dump(1);
        if($p->Category_ID == $c->Category_ID){
            
            array_push($products, $p);
            $c->Products = $p;
        }
    }
}
?>

<body>

<nav class="mb-5 navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">TechShop</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " aria-current="page" href="shop.php">Shop</a>
                    </li>
                    <li>
                    <a class="nav-link" href="aboutme.php">About Me</a>
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
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center"><h1 class="display-1">Welcome</h1></div>
    </div>
    <div class="row ">
        <div class="d-flex justify-content-center"><h1 class="display-6">Our new products</h1></div>
    </div>
    <hr>
    <?php
    foreach($categories as $c){ 
    ?>
    <div class="row ">
        <div class=""><h1 class="display-6"><?=$c->Category_Name?></h1></div>
    </div>
    
    <?php
    $products = returnProductsCat($c->Category_ID);
    $products = array_reverse($products);
    $products = array_slice($products, 0, 4, true);
   
    ?>

    
            <div class="row">
                <div class="col-md-12">
                    <div class="container mydiv">
                        <div id="produstsShop" class="row">


                            <?php
                            
                                foreach ($products as $p) {
                                    

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
                                                
                                            </div>

                                        </div>
                                        

                                <?php

                                    }
                                
                            

                                ?>
                            
                        

                        </div>
                    </div>

                    
                </div>
            </div>
                                <hr>
        
                                <?php

                                    
                                }
                            

                                ?>
                            
                            </div>
</div>

   

    <?php
    include "pages/footer.php";
    ?>