<?php

// Include database connection
include("db_connect.php");

// Fetch services from the database
$query = "SELECT service, Service_Category FROM tbl_services ORDER BY Service_Category, service";
$result = mysqli_query($db_connection, $query);
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


/* Apply these styles only to screens with a width of 767px or smaller (common mobile screen size) */
@media (max-width: 767px) {
    .service-selector-container .custom-select {
        width: 100%;
        padding: 10px;
        border-radius: 30px;
        border: 1px solid #d9d9d9;
        background-color: #f5f5f5;
        color: #7E007F;
        font-size: 18px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        text-align: center;
    }

    .service-selector-container .custom-select:focus {
        border-color: #7E007F;
        outline: none;
        box-shadow: 0 0 5px rgba(126, 0, 127, 0.5);
    }

    .service-selector-container .custom-select option {
        color: #333;
    }

    .service-selector-container .btn-next {
        width: 100%;
        background-color: #7E007F;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 15px;
        font-size: 18px;
        cursor: pointer;
        margin-top: 10px;
    }

    .service-selector-container .btn-next:hover {
        background-color: #9E009F;
    }

    .service-selector-container .custom-select::-ms-expand {
        display: none;
    }

    .service-selector-container {
        max-width: 400px; /* Adjust this based on the design */
        margin: 0 auto;
    }
}

@media only screen and (max-width: 600px) {
    select optgroup {
        display: block;
        font-weight: bold;
        color: #7E007F; /* Optional to match your theme */
    }
    select option {
        padding-left: 10px; /* Optional, for better indentation */
    }
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
        <b>Select Service > </b>
        </label>
            <label style="color: rgba(116, 116, 116, 0.67);" > Select a date > Select time > Information > Summary > Confirmation</label>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                    <div class="well">
                                        <br>
                                        <div class="service-selector-container">
                                            <label style="color: #7E007F;" for="service">Select a service:</label>
                                            <br>
                                            <select name="service" id="service" class="custom-select">
                                                <option value="">Select a service</option>
                                                <?php
                                                include("db_connect.php");

                                                // Query to fetch services, grouped by category and ordered by category
                                                $query = "SELECT service, Service_Category FROM tbl_services ORDER BY Service_Category, service";
                                                $result = $db_connection->query($query);

                                                // Initialize an array to track displayed categories
                                                $displayedCategories = array();

                                                // Loop through each service and group by categories
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    // Check if the current service belongs to a new category
                                                    if (!in_array($row['Service_Category'], $displayedCategories)) {
                                                        // Close the previous optgroup if it's not the first category
                                                        if (!empty($displayedCategories)) {
                                                            echo "</optgroup>";
                                                        }
                                                        // Start a new optgroup with the current category
                                                        echo "<optgroup label='" . htmlspecialchars($row['Service_Category']) . "'>";
                                                        $displayedCategories[] = $row['Service_Category'];
                                                    }
                                                    // Add the service as an option within the current optgroup
                                                    echo "<option value='" . htmlspecialchars($row['service']) . "'>" . htmlspecialchars($row['service']) . "</option>";
                                                }

                                                // Close the last optgroup
                                                if (!empty($displayedCategories)) {
                                                    echo "</optgroup>";
                                                }
                                                ?>
                                            </select>
                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <a id="next-button" href="javascript:void(0);" onclick="proceed()" class="btn btn-primary btn-lg rounded w-lg mt-3">Next</a>
                                            </div>
                                        </div>



                                        
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


    <script>
        function proceed() {
            var selectedService = document.getElementById("service").value;
            if (selectedService === "") {
                alert("Please select a service to proceed.");
            } else {
                window.location.href = "guest-SelectDate.php?selectedservice=" + encodeURIComponent(selectedService);
            }
        }
</script>

</body>
</html>
