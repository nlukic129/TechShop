<!-- BOOTSTRAP 5 NAWS AND TABS SE NALAZI STA CE DA BUDE KOD ADMINISTRATORA I MODERATORA ISPISANO -->
<!-- BOOTSTRAP 5 OFFCANVAS KORPA KOJA CE DA IZLAZI SA STRANE DA SE VIDIS TA SE KUPUJE PRIVREMENO -->
<!-- BOOTSTRAP 5 BAGES OBAVESTENJA KOJA ISKACU KAD SE NESTO DODA U KORPU -->

<?php
include "pages/head.php";
session_start();
?>
<link href="assets/dist/css/basket.css" rel="stylesheet">
<body>

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
                if (isset($_SESSION['user']) ) {
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





    <div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
                            <?php
                                if(isset($_SESSION['basket']) && count($_SESSION['basket']) != 0){
                                $total = 0;    
                                
                                $products = $_SESSION['basket']
                            ?>
                        <div class="cart_items" id="basketCards">
                            
                            <ul class="cart_list" >
                                <?php
                                    foreach($products as $p){

                                    
                                ?>
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image"><img src="<?=$p->Image_Url?>" alt=""></div>
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Name</div>
                                                        <div class="cart_item_text"><?=$p->Product_Name ?></div>
                                                    </div>
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title">Category</div>
                                                        <div class="cart_item_text"><?=$p->Category_Name ?></div>
                                                    </div>
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title">Quantity</div>
                                                        <div class="cart_item_text"><input type="number" class="form-control tbQuantity" data-idq = "<?=$p->Product_ID ?>" value="<?=$p->Quantity?>"></div>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Price</div>
                                                        <div class="cart_item_text">$<?= $p->Product_UnitPrice?>.00</div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Total</div>
                                                        <div class="cart_item_text">$<?= $p->Total?>.00</div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <button type="button" class="btn-close btnDeleteBasket" data-idd = "<?=$p->Product_ID ?>" aria-label="Close"></button>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </li>

                                <?php
                                $total +=  $p->Total;
                                    }
                                ?>
                            </ul>
                        </div>
                    <div id="total">
                            <div class="order_total" id="total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">$<?= $total?>.00</div>
                            </div>
                        </div>
                        <div class="cart_buttons"> 
                            <button type="button" class="btnBackShop button cart_button_clear">Back To Shop</button> 
                            <button type="button" value="ordering" class="btnOrdering button cart_button_checkout">Ordering</button> 
                        </div>
                    </div>

                            <?php
                                }else{    
                            ?>

                                <p>No products</p>
                                <div class="cart_buttons"> <button type="button" id="btnBackShop" class="btnBackShop button cart_button_clear">Back To Shop</button> 
                                </div>

                            <?php
                                } 
                            ?>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>







    <?php
    
    include "pages/footer.php";
    ?>