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
                
                <div id="basket" class=" mx-auto">
                </div>
                 <a class="nav-link" href="index.php">Back To Site</a>
                

            </div>

        </div>

    </nav>

    <section id="home" class="about-us">
			<div class="container">
				<div class="about-us-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="single-about-us">
								<div class="about-us-txt">
									
										<div class="row">
                                            <div class="col-sm-6 col-md-5">
                                              <div class="about-img">
                                                <img src="images/me/m1.jpg" class="img-fluid rounded b-shadow-a" alt="">
                                              </div>
                                            </div>
                                            <div class="col-sm-6 col-md-7">
                                              <div class="about-info">
                                                <p class="stil"><span class="title-s">Name: </span> <span>Nebojša Lukić</span></p>
                                                <p class="stil"><span class="title-s">Idex: </span> <span>60/19</span></p>
                                                <p class="stil"><span class="title-s">Email: </span> <span>nebojsa.lukic.60.19@ict.edu.rs</span></p>
                                                <p class="stil"><span class="title-s">Phone: </span> <span>063 518425</span></p>
                                              </div>
                                            </div>
                                        </div>
								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-0">
							<div class="single-about-us">
								
							</div><!--/.single-about-us-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.about-us-content-->
			</div><!--/.container-->

		</section><!--/.about-us-->
		<!--about-us end -->

</div>

   

    <?php
    include "pages/footer.php";
    ?>