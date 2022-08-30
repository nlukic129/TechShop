<?php
include "pages/head.php";
include "config/connection.php";
include "models/functions.php";
session_start();
?>

<body>
    <link href="assets/dist/css/view.css" rel="stylesheet">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TechShop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>

                </ul>

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

    <?php
    if (isset($_GET['product'])) {
        $id = $_GET['product'];
        $prod = returnProduct($id);
        if ($prod->Product_Activity == 1 && $prod->Product_UnitsInStock > 0) {


    ?>
            <div class="super_container">

                <div class="single_product">
                    <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
                        <div class="row">
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-4 order-lg-2 order-1">
                                <div class="image_selected"><img src="<?= $prod->Image_Url ?>" alt="product"></div>
                            </div>
                            <div class="col-lg-6 order-3">
                                <div class="product_description">

                                    <div class="product_name"><?= $prod->Product_Name ?></div>



                                    <hr class="singleline">
                                    <div>
                                        <h5>Description: </h5> <span class="product_info"><?= $prod->Product_Desription ?></span>
                                    </div>
                                    <hr>
                                    <div>

                                        <h5>Available: </h5> <span class="product_info"><?= $prod->Product_UnitsInStock ?></span>
                                        <?php
                                        if ($prod->Product_UnitsInStock == 1) {
                                        ?>
                                            <span class="product_info"> product</span>
                                        <?php
                                        } else {

                                        ?>
                                            <span class="product_info"> products</span>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                    <hr class="singleline">
                                    <div class="order_info d-flex flex-row">
                                        <form action="#">
                                    </div>
                                    <?php
                                        if (isset($_SESSION['user'])) {
                                            $user = $_SESSION['user'];
                                            if($user->Type_ID == 3){
                                        ?>
                                            <div class="row">
                                        <div class="col-xs-6" style="margin-left: 13px;">
                                            <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="text" pattern="[0-9]*" value="1">

                                            </div>
                                        </div>
                                        <div class="col-xs-6"> <button type="button" data-idprod = "<?=$prod->Product_ID?>" class="btn btn-primary shop-button">Add to Cart</button>

                                        </div>
                                    </div>


                                        <?php
                                            }
                                        } else {

                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                        </div>  

                    </div>
                    
                </div>
                 
            </div>

             
    <?php
        }
    }
    ?>
</body>
<?php
include "pages/footer.php";
?>