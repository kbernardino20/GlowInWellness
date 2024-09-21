<?php

include("input-validation.php");  
include("register-process.php"); 

// Check if the 'alert' key exists in the URL
if (isset($_GET['alert'])) {
    // Retrieve the alert message from the URL
    $alertMessage = urldecode($_GET['alert']);

    // Display the alert message
    echo "<script>alert('$alertMessage');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Glow in Wellness</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Allura&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <!-- Bootstrap + LeadMark main styles -->
	  <link rel="stylesheet" href="assets/css/leadmark.css">
    

    <style>
        .headtitle {
            font-family: 'Allura', cursive;
            font-size: 150px;
        }

        .signGloria {
            font-family: 'Grey Qo', cursive;
            color: #7E007D;
        }

        .sectitle {
            font-family: 'Sacramento', cursive;
            color: #7E007D;

        }

        .padding-cell {
            padding: 8px; 
            font-size: 0.85rem; 
        }

        .footericon {
            padding: 5px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        .footericon:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/imgs/logo.svg" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="contact">
                        <a class="nav-link" href="index.php">Back to home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Second Navigation -->


    <!-- Register Section -->
    <section id="login" class="section has-img-bg pb-0" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                <form method="post">
                    <h4 class="text-center sectitle" style="font-size: 40px;">Register</h4>
                    <div class="row">
                        <!-- Left column for first name, last name and mobile number -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname" style="font-size: 15px; color: #7E007D;">First Name</label>
                                <?php echo isset($fn_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $fn_error . "*</h10>" : "" ?>
                                <input type="text" class="form-control" name="firstname" placeholder="Enter text here" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
                                <br>
                                <label for="lastname" style="font-size: 15px; color: #7E007D;">Last Name</label>
                                <?php echo isset($ln_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $ln_error . "*</h10>" : "" ?>
                                <input type="text" class="form-control" name="lastname" placeholder="Enter text here" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                                <br>
                                <label for="mobile" style="font-size: 15px; color: #7E007D;">Mobile Number</label>
                                <?php echo isset($dept_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $dept_error . "*</h10>" : "" ?>
                                <input type="empno" class="form-control" name="dept" placeholder="Enter text here" value="<?php echo isset($_POST['dept']) ? $_POST['dept'] : '' ?>" required>
                            </div>
                        </div>
                        <!-- Right column for email, username and password -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" style="font-size: 15px; color: #7E007D;">Email</label>
                                <?php echo isset($email_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $email_error . "*</h10>" : "" ?>
                                <input type="text" class="form-control" name="email" placeholder="Enter text here" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                                <br>
                                <label for="username" style="font-size: 15px; color: #7E007D;">Username</label>
                                <?php echo isset($enumber_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $enumber_error . "*</h10>" : "" ?>
                                <input type="text" class="form-control" name="enumber" placeholder="Enter text here" value="<?php echo isset($_POST['enumber']) ? $_POST['enumber'] : '' ?>" required>
                                <br>
                                <label for="password" style="font-size: 15px; color: #7E007D;">Password</label>
                                <?php echo isset($password_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $password_error . "*</h10>" : "" ?>
                                <input type="password" class="form-control" name="password" placeholder="Enter text here" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary rounded w-md mt-3" style="width: 100%;" value="Register" name="submit">
                    <br><br>
                    <p class="text-center" style="font-size: 15px; color: #000000;">Already have an account? <strong><a href="login.php">Login here</a></strong></p>
                </form>
            </div>
        </div>
        <!-- Copyright paragraph placed here outside the row but inside the container -->
         <br>
         <div style="flex-grow: 1; height: 1px; background-color: #ccc;"></div>
        <p class="mb-0 small text-center" style="padding-top: 20px;">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved</p>
        <br><br>
    </div>
</section>

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>

</body>
</html>