<?php
include "pages/head.php";
include "models/functions.php";
include "config/connection.php";
$countries = returnAll("countries");
session_start();
?>

<?php
if (!isset($_SESSION['user'])) {

?>


    <body class="">

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TechShop</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto py-5">
                    <h3>Registration form</h3>




                    <form action="" class="mt-5 " novalidate>



                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <div><input type="text" id="tbFirstName" class="form-control " /></div>
                                    <div id="errorFName" class="invalid-feedback">
                                        Please enter a valide first name.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" id="tbLastName" class="form-control" />
                                    <div id="errorLName" class="invalid-feedback">
                                        Please enter a valide last name.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" id="tbEmail" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                <div id="errorEmail" class="invalid-feedback">
                                    Please enter a valide email.
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="text" id="tbPhone" class="form-control" />
                                    <div id="errorPhone" class="invalid-feedback">
                                        Please enter a valide phone number.
                                        (xxx xxx xxx(x))

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Username</label>
                                    <input type="text" id="tbUsername" class="form-control" />
                                    <div id="errorUser" class="invalid-feedback">
                                        Please enter a valide username.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="answer" class="invalid-feedback">
                            Enter all address information.
                        </div>

                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Country</label>
                                    <select name="" id="ddlCountries" class="form-control">
                                        <option value="0">Choose...</option>
                                        <?php
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
                                    <input type="text" name="" id="tbCity" class="form-control">

                                    <div id="errorCity" class="invalid-feedback">
                                        Please enter a valide city name.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Zip Code</label>
                                    <input type="text" name="" id="tbZipCode" class="form-control">
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
                                    <input type="text" name="" id="tbStreetName" class="form-control">
                                    <div id="errorSName" class="invalid-feedback">
                                        Please enter a valide street name.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Street Number</label>
                                    <input type="text" name="" id="tbStreetNumber" class="form-control">
                                    <div id="errorSNum" class="invalid-feedback">
                                        Please enter a valide street number.
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Password</label>
                                    <input type="password" id="tbPassword" class="form-control" />
                                    <div id="errorPass" class="invalid-feedback">
                                        Please enter a valide password.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Password Check</label>
                                    <input type="password" id="tbPasswordC" class="form-control" />
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Show pasword
                                        </label>
                                    </div>


                                    <div id=" errorPassC" class="invalid-feedback">
                                        Passwords do not match.
                                    </div>
                                </div>
                            </div>
                        </div>



                        <input type="button" value="Registration" id="btnReg" class="btn btn-primary" />
                    </form>

                    <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                    </div>

                </div>
            </div>
        </div>

    <?php
} else {
    header("Location: 404.php");
}
    ?>


    <?php
    include "pages/footer.php";

    ?>