<?php

include("db_connect.php");

// Retrieve URL parameters
$selectedservice = isset($_GET['selectedservice']) ? urldecode($_GET['selectedservice']) : '';
$selectedDate = isset($_GET['selecteddate']) ? urldecode($_GET['selecteddate']) : '';
$selectedDay = isset($_GET['selectedday']) ? urldecode($_GET['selectedday']) : '';
$selectedTime = isset($_GET['selectedtime']) ? urldecode($_GET['selectedtime']) : '';

// Retrieve form data
$firstName = isset($_GET['fname']) ? urldecode($_GET['fname']) : '';
$lastName = isset($_GET['lname']) ? urldecode($_GET['lname']) : '';
$mobileNumber = isset($_GET['mobile']) ? urldecode($_GET['mobile']) : '';
$email = isset($_GET['email']) ? urldecode($_GET['email']) : '';


$searchDuration_query = "SELECT * FROM tbl_services WHERE service = '$selectedservice'";
$Durationresult = $db_connection->query($searchDuration_query);

while ($row = $Durationresult->fetch_assoc()) {
    $ServicePrice = $row['price']; 
    $ServiceDesc = $row['service_description']; 
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
    .receipt-container {
        max-width: 450px;
        width: 100%;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        box-sizing: border-box;
        color: #000000;
    }
    .receipt-container h2 {
        font-size: 16px;
        margin-bottom: 5px;
        font-weight: normal;
    }
    .receipt-container p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }
    .service-description {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    .service-description .service-name {
        font-weight: bold;
        font-size: 14px;
        margin-right: 10px;
        text-align: left;
        flex-grow: 1;
    }
    .service-description .service-price {
        font-size: 14px;
        white-space: nowrap;
    }
    .services {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
    .total-price {
        background-color: #dff0d8;
        padding: 10px;
        border-radius: 10px;
        font-weight: bold;
        font-size: 16px;
        color: #3c763d;
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        white-space: nowrap;
    }
    hr {
        border: 0;
        border-top: 2px solid #e771f9;
        margin: 10px 0;
    }

    /* Media queries for mobile */
    @media (max-width: 768px) {
        .receipt-container {
            padding: 10px;
            width: 100%;
        }
        .receipt-container h2 {
            font-size: 1.2rem;
        }
        .receipt-container p, 
        .service-description .service-name, 
        .service-description .service-price, 
        .services span {
            font-size: 0.9rem;
        }
        .total-price {
            font-size: 1rem;
            padding: 8px;
        }
        .btn {
            width: 100%;
        }
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
        <!-- <a href="index.php" class="btn custom-mobile-btn d-md-none">Back to home</a> -->

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
        <label style="color: #7E007F;">
        Select Service > Select a date > Select time > Information >
        </label>
        <label style="color: #ffffff;">
            <a href="#" style="color: #ffffff; text-decoration: none;"><b> Summary > </b></a>
        </label>
            <label style="color: rgba(116, 116, 116, 0.67);" >  Confirmation</label>
            <br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        
                                    <div class="well">
        <div class="receipt-container">
            <h2>Name: <span><?php echo $firstName . " " . $lastName ?></span></h2>
            <p>Email: <span><?php echo $email ?></span></p>
            <p>Mobile: <span><?php echo $mobileNumber ?></span></p>
            <hr><br>
            
            <div class="service-description d-flex justify-content-between">
                <span class="service-name"><?php echo $selectedservice; ?></span>
                <span class="service-price">A$<?php echo $ServicePrice ?></span>
            </div>
            <br>
            <p><?php echo $ServiceDesc ?></p>
            <br>
            
            <div class="services d-flex justify-content-between">
                <span>DATE:</span>
                <span><?php echo $selectedDate?></span>
            </div>
            
            <div class="services d-flex justify-content-between">
                <span>TIME:</span>
                <span><?php echo $selectedTime?></span>
            </div>
            <br><hr>
            
            <div class="total-price d-flex justify-content-between">
                <span>Total price</span>
                <span>A$<?php echo $ServicePrice ?></span>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <form action="user-BookingConfirmation_process.php" method="POST">
                <!-- Hidden fields to pass the necessary data -->
                <input type="hidden" name="selectedservice" value="<?php echo $selectedservice; ?>">
                <input type="hidden" name="selecteddate" value="<?php echo $selectedDate; ?>">
                <input type="hidden" name="selectedtime" value="<?php echo $selectedTime; ?>">
                <input type="hidden" name="serviceprice" value="<?php echo $ServicePrice; ?>">
                <input type="hidden" name="servicedesc" value="<?php echo $ServiceDesc; ?>">

                <!-- Back button -->
                <a href="guest-Information.php?selectedservice=<?php echo urlencode($selectedservice); ?>&selectedday=<?php echo urlencode($selectedDay); ?>&selecteddate=<?php echo urlencode($selectedDate); ?>&selectedtime=<?php echo urlencode($selectedTime); ?>" class="btn btn-outline-primary btn-lg rounded w-100 mt-3">Back</a>
                
                <!-- Confirm Booking button -->
                <a href="<?php echo 'guest-BookingConfirmation_process.php?selectedservice=' . urlencode($selectedservice) . 
                            '&selecteddate=' . urlencode($selectedDate) . 
                            '&selectedday=' . urlencode($selectedDay) . 
                            '&selectedtime=' . urlencode($selectedTime) . 
                            '&fname=' . urlencode($firstName) . 
                            '&lname=' . urlencode($lastName) . 
                            '&mobile=' . urlencode($mobileNumber) . 
                            '&email=' . urlencode($email); ?>" 
                   class="btn btn-primary btn-lg rounded w-100 mt-3">Confirm Booking</a>
            </form>
        </div>
    </div>
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


</body>
</html>
