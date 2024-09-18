<?php

include("input-validation.php");  
include("login-process.php"); 

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
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
            font-family: 'Satisfy', cursive;
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


    <!-- Login Section -->
    <section id="login" class="section has-img-bg pb-0" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                <form method="post">
                    <h4 class="text-center sectitle" style="font-size: 40px;">Login</h4>
                    <div class="form-group">
                        <p for="username" style="font-size: 15px; color: #7E007D;">Username</p>
                        <?php echo isset($enumber_error) ? "<h10 style='color:red; font-size: 10px;'>*" . $enumber_error . "*</h6>" : "" ?>
                        <input type="normal" class="form-control" name="enumber" placeholder="Username" value="<?php echo isset($_POST['enumber']) ? $_POST['enumber'] : '' ?>" required>
                      <br>
                        <p for="password" style="font-size: 15px; color: #7E007D;">Password</p>
                        <?php echo isset($password_error) ? "<h10 style='color:red; font-size: 10px;'>*" . $password_error . "*</h6>" : "" ?>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                    </div>
                    <div class="form-group" style="text-align: right;">
                        <p style="font-size: 12px; color: #000000;"><a href="forgotpassword.php">Forgot password</a></p>
                    </div>
                    <input type="submit" class="btn btn-primary rounded w-md mt-3" style="width: 100%;" value="Login" name="submit">
                    <br><br>
                    <p class="text-center" style="font-size: 15px; color: #000000;">Don't have an account? <strong><a href="register.php">Sign up now</a></strong></p>
                    <div style="display: flex; align-items: center; justify-content: center; margin: 20px 0;">
                        <div style="flex-grow: 1; height: 1px; background-color: #ccc;"></div>
                        <p style="margin: 0 10px; color: #000;">or</p>
                        <div style="flex-grow: 1; height: 1px; background-color: #ccc;"></div>
                    </div>
                    <a href="guest-Services.php" class="btn btn-outline-primary btn-lg rounded w-lg mt-3" style="width: 100%;">Continue as Guest</a>
                    <br>
                </form>
            </div>
        </div>
        <!-- Copyright paragraph placed here outside the row but inside the container -->
         <br><br>
         <div style="flex-grow: 1; height: 1px; background-color: #ccc;"></div>
        <p class="mb-0 small text-center" style="padding-top: 20px;">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved</p>
        <br><br>
    </div>

    
</section>
<!-- Loader -->
<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div class="loader-overlay"></div>

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
