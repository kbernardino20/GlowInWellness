<?php

include("db_connect.php");

// Retrieve selected date, day, time and service
$orderNumber = isset($_GET['orderNumber']) ? $_GET['orderNumber'] : '';

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

        .time-picker {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 400px;
            margin: 20px auto;
        }

        .time-picker button {
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%; /* Ensures buttons fill their grid cell */
        }

        .time-picker button:hover {
            background-color: #f0f0f0;
        }

        .time-picker button:active {
            background-color: #ddd;
        }

        .time-picker button.selected {
                background-color: #edc4f3;
                border-color: #edc4f3;
        }


        /* Style for the Back to home button in mobile view */
.custom-mobile-btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: white;
    color: black;
    border: 2px solid #e771f9;
    font-weight: bold;
    border-radius: 4px;
    text-align: center;
}

/* Hide the button for larger screens (desktop view) */
@media (min-width: 768px) {
    .custom-mobile-btn {
        display: none;
    }
}

/* Style for desktop view */
.nav-link {
    color: black;
    font-weight: bold;
}
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/imgs/logo.svg" alt="Logo">
        </a>

        <!-- Back to home button for mobile -->
        <a href="index.php" class="btn custom-mobile-btn d-md-none">Back to home</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto d-none d-md-flex">
                <li class="nav-item">
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
    <div class="content transition text-center">
		<div class="container-fluid dashboard">

        <label style="color: #ffffff;">
        <a href="#" style="color: #ffffff; text-decoration: none; font-size: 30px;">Order <b> Confirmed </b></a>
        </label>

            <br><br><br>
                <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-12 col-sm-9 col-md-7 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <!-- Main Content -->
                                <div class="text-center p-4" style="font-family: Arial, sans-serif; background-color: #f8f8f8; border-radius: 12px; margin: 0 auto;">
                                    <!-- Checkmark Icon -->
                                    <div style="font-size: 100px; color: #4CAF50;">&#10004;</div><br>

                                    <!-- Confirmation Message -->
                                    <div style="font-size: 24px; color: #333;">Thank you for your request!</div><br>
                                    <div style="font-size: 16px; color: #777;">Your order number:</div>

                                    <!-- Order Number -->
                                    <div style="font-size: 36px; color: #333; font-weight: bold;"><?php echo $orderNumber; ?></div>
                                </div><br>

                                <!-- Back to Home Button -->
                                <div class="text-center">
                                    <a href="index.php" class="btn btn-outline-primary btn-lg rounded w-100 mt-4" style="font-size: 20px;">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
	</div>
        <!-- Copyright paragraph placed here outside the row but inside the container -->
         <br><br>
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

    <script>
    document.querySelectorAll('.time-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.time-button').forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

    </script>

</body>
</html>
