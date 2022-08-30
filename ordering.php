<?php

session_start();
header("Content-type: appliation.json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    
    http_response_code(204);
    
} else {
    http_response_code(404);
}
?>


<?php
include "pages/head.php";
include "config/connection.php";
include "models/functions.php";
$products = $_SESSION['basket'];
?>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TechShop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
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

<div class="container">
    <div class="row">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Biling details</h5>
      </div>
      <div class="card-body">
      <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Name: <b><?=$user->User_FirstName?> <?=$user->User_LastName?></b> </label>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email: <b><?=$user->User_Email?></b></label>
                            
                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Phone Number: <b><?=$user->User_Phone?></b></label>
                                    
                                </div>
                            </div>
                        </div>

                        


                        <div id="answer" class="invalid-feedback">
                            Enter all address information.
                        </div>

                        <?php
                        $userA = returnUserId($user->User_ID);
                        if(isset($userA->Address_City)){
                        ?>
                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Country</label>
                                    <select name="" id="ddlCountries" class="form-control">
                                        <option value="0">Choose...</option>
                                        <?php
                                        $countries = returnAll('countries');
                                        foreach ($countries as $c) :
                                            if($c->Country_ID == $userA->Country_ID){
                                        ?>
                                            <option value="<?= $c->Country_ID ?>" selected><?= $c->country_name ?></option>
                                        <?php
                                            }
                                        ?>
                                            <option value="<?= $c->Country_ID ?>"><?= $c->country_name ?></option>
                                        <?php
                                            
                                        endforeach;
                                        ?>
                                    </select>
                                    <div id="errorCountry" class="invalid-feedback">
                                        Please choose a country.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="">City</label>
                                
                                    <input type="text" name="" id="tbCity" value = "<?=$userA->Address_City?>" class="form-control">

                                    <div id="errorCity" class="invalid-feedback">
                                        Please enter a valide city name.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Zip Code</label>
                                    <input type="text" name="" id="tbZipCode" class="form-control" value = "<?=$userA->Zip_Code?>">
                                    <div id="errorZip" class="invalid-feedback">
                                        Please enter a valide zip code.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Street Name</label>
                                    <input type="text" name="" id="tbStreetName" class="form-control" value = "<?=$userA->Address_Street?>">
                                    <div id="errorSName" class="invalid-feedback">
                                        Please enter a valide street name.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Street Number</label>
                                    <input type="text" name="" id="tbStreetNumber" class="form-control" value = "<?=$userA->Address_Number?>">
                                    <div id="errorSNum" class="invalid-feedback">
                                        Please enter a valide street number.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php
                        }else{
                        ?>
                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Country</label>
                                    <select name="" id="ddlCountries" class="form-control">
                                        <option value="0">Choose...</option>
                                        <?php
                                        $countries = returnAll('countries');
                                        foreach ($countries as $c) :   
                                        ?>                                          
                                            <option value="<?= $c->Country_ID ?>"><?= $c->country_name ?></option>
                                        <?php
                                            
                                        endforeach;
                                        ?>
                                    </select>
                                    <div id="errorCountry" class="invalid-feedback">
                                        Please choose a country.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="">City</label>
                                
                                    <input type="text" name="" id="tbCity"  class="form-control">

                                    <div id="errorCity" class="invalid-feedback">
                                        Please enter a valide city name.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Zip Code</label>
                                    <input type="text" name="" id="tbZipCode" class="form-control" >
                                    <div id="errorZip" class="invalid-feedback">
                                        Please enter a valide zip code.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Street Name</label>
                                    <input type="text" name="" id="tbStreetName" class="form-control" >
                                    <div id="errorSName" class="invalid-feedback">
                                        Please enter a valide street name.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Street Number</label>
                                    <input type="text" name="" id="tbStreetNumber" class="form-control" >
                                    <div id="errorSNum" class="invalid-feedback">
                                        Please enter a valide street number.
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
  <?php
  $total = 0;
            foreach($products as $p){
            
            $total += $p->Total;
            
            }
            ?>

  <div class="col-md-4 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Summary</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li
            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            Products
            <span>$<?=$total?>.00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
            Shipping
            <span>Gratis</span>
          </li>
          <li
            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>Total amount</strong>
              <strong>
                <p class="mb-0">(including VAT)</p>
              </strong>
            </div>
            <span>$<?=$total?>.00</span>
          </li>
        </ul>

        <button type="button" id="btnPurchase" class="btn btn-primary btn-lg btn-block">
          Make purchase
        </button>
      </div>
    </div>
  </div>
</div>
</div>

    <?php
    include "pages/footer.php";
    
    ?>