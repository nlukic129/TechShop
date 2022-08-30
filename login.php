<?php
include "pages/head.php";
session_start();
?>

<?php
if (!isset($_SESSION['user'])) {

?>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TechShop</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>

                    </ul>



                </div>
            </div>
        </nav>


        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form>
                            <h1>Login</h1>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="tbUsername" class="form-control form-control-lg" placeholder="Enter a valid username" />
                                <label class="form-label" for="form3Example3">Username</label>
                                <div id="errorUsername" class="invalid-feedback">
                                    Please enter a valide username.
                                </div>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="tbPass" class="form-control form-control-lg" placeholder="Enter password" />
                                <label class="form-label" for="form3Example4">Password</label>
                                <div id="errorPass" class="invalid-feedback">
                                    Please enter a valide password.
                                </div>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="button" class="btn btn-primary btn-lg" id="btnLog" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="registration.php" class="link-danger">Register</a></p>

                            </div>
                            <div class="alert alert-danger" style="display: none;" id="blocked" role="alert">
                                <p id="acc"></p>
                                <p>Reason:</p>
                                <p id="reason"></p>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">If you think it's a mistake, write to us here.</label>
                                    <textarea id="tbText" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <button type="button" class="btn btn-outline-danger mt-3" id="btnBlock">Send</button>
                                </div>
                            </div>
                            <div class="alert alert-success" style="display: none;" id="success" role="alert">
                                A simple success alert—check it out!
                            </div>
                            <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

    <?php
} else {
    header("Location: 404.php");
}
    ?>

    <?php
    include "pages/footer.php";
    ?>