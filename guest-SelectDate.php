<?php
include("db_connect.php");

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


/* Hide the mobile date picker by default */
.mobile-only {
    display: none;
}

/* Hide the desktop date picker on mobile devices */
.desktop-only {
    display: none;
}

/* Show mobile date picker on devices with width <= 768px */
@media (max-width: 768px) {
    .mobile-only {
        display: inline-block;
    }
}

/* Show desktop date picker on devices with width > 768px */
@media (min-width: 769px) {
    .desktop-only {
        display: inline-block;
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
        <!-- <label style="color: #7E007F;">
            <a href="guest-Services.php" style="color: #7E007F; text-decoration: none;">Select Service > </a>
        </label>
        <label style="color: #ffffff;">
            <a style="color: #ffffff; text-decoration: none;"><b>Select a date > </b></a>
        </label>
            <label style="color: rgba(116, 116, 116, 0.67);" > Select time > Information > Confirmation</label> -->

        <label style="color: #7E007F;">
        Select Service >
        </label>
        <label style="color: #ffffff;">
        <b> Select a date > </b>
        </label>
        <label style="color: rgba(116, 116, 116, 0.67);" > Select time > Information > Summary > Confirmation</label>

                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        
                                        <div class="well p-3" style="max-width: 500px; margin: 0 auto;">
                                            <br>
                                            <div>
                                                <label style="color: #7E007F;" for="date-picker">Select a date:</label>
                                                <br>
                                                <!-- Date Picker Input -->
                                                <!-- Mobile Date Picker -->
                                                <input type="date" id="mobile-date-picker" value="" class="mobile-only" >

                                                <!-- Desktop Date Picker -->
                                                <input type="date" id="desktop-date-picker" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" class="desktop-only" >

                                                
                                                <br><br>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <a href="guest-Services.php" class="btn btn-outline-primary btn-lg rounded w-100 mx-1 mt-3">Back</a>
                                                <!-- Mobile Next Button -->
                                                <a id="next-button-mobile" href="#" class="btn btn-primary btn-lg rounded w-100 mx-1 mt-3 mobile-only">Next</a>

                                                <!-- Desktop Next Button -->
                                                <a id="next-button-desktop" href="#" class="btn btn-primary btn-lg rounded w-100 mx-1 mt-3 desktop-only">Next</a>

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
    

document.getElementById('desktop-date-picker').addEventListener('change', function() {
    if (!this.value) return; // Do nothing if no date is selected
    
    var date = new Date(this.value);
    var day = date.getUTCDay(); // Sunday - Saturday : 0 - 6
    var dayOfWeek = date.toLocaleDateString('en-US', { weekday: 'long' });

    if (day === 1 || day === 6) {
        alert('The selected date falls on a closed day. Please choose another date.');
        this.value = ''; // Clear the date if it's a closed day
    } else if (day === 0) {
        alert("If you'd like to book an appointment on this day, please contact info@glowinwellness.com.au.");
        this.value = ''; // Clear the date if it's a Sunday
    } else {
        // Get the selected service from the URL
        var urlParams = new URLSearchParams(window.location.search);
        var selectedService = urlParams.get('selectedservice');

        // If the date is valid, update the href of the "Next" button
        document.getElementById('next-button-desktop').href = 'guest-SelectTime.php?selecteddate=' + encodeURIComponent(this.value) + '&selectedday=' + encodeURIComponent(dayOfWeek) + '&selectedservice=' + encodeURIComponent(selectedService);
    }
    });

    document.getElementById('next-button-desktop').addEventListener('click', function(event) {
        var selectedDate = document.getElementById('desktop-date-picker').value;
        if (!selectedDate) {
            event.preventDefault(); // Prevent the navigation
            alert('Please select a date before proceeding.');
        }
    });



    document.getElementById('next-button-mobile').addEventListener('click', function(event) {
    var dateInput = document.getElementById('mobile-date-picker');
    var selectedDateValue = dateInput.value;

    if (!selectedDateValue) {
        event.preventDefault(); // Prevent the navigation
        alert('Please select a date before proceeding.');
        return;
    }

    var selectedDate = new Date(selectedDateValue);
    var today = new Date();
    today.setHours(0, 0, 0, 0); // Reset the time for comparison to today's date

    // Format today's date as yyyy-mm-dd
    var formattedToday = today.getFullYear() + '-' + 
        ('0' + (today.getMonth() + 1)).slice(-2) + '-' + 
        ('0' + today.getDate()).slice(-2);

    // Format selected date as yyyy-mm-dd
    var formattedSelectedDate = selectedDate.getFullYear() + '-' + 
        ('0' + (selectedDate.getMonth() + 1)).slice(-2) + '-' + 
        ('0' + selectedDate.getDate()).slice(-2);

    // Check if the selected date is today
    if (formattedSelectedDate === formattedToday) {
        alert("Same day booking is not allowed. Please choose another date.");
        dateInput.value = ''; // Clear the date if it's today
        return; // Stop further execution
    }

    // Check if the selected date is in the past
    if (selectedDate < today) {
        alert("Past dates are not allowed. Please choose another date.");
        dateInput.value = ''; // Clear the date if it's a past date
        return;
    }

    var day = selectedDate.getUTCDay(); // Sunday - Saturday : 0 - 6
    var dayOfWeek = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });

    // Check if the selected day is a closed day (Monday or Saturday)
    if (day === 1 || day === 6) { // Monday or Saturday
        alert('The selected date falls on a closed day. Please choose another date.');
        dateInput.value = ''; // Clear the date if it's a closed day
    } else if (day === 0) { // Sunday
        alert("If you'd like to book an appointment on this day, please contact info@glowinwellness.com.au.");
        dateInput.value = ''; // Clear the date if it's a Sunday
    } else {
        // Get the selected service from the URL
        var urlParams = new URLSearchParams(window.location.search);
        var selectedService = urlParams.get('selectedservice');

        // If the date is valid, update the href of the "Next" button
        document.getElementById('next-button-mobile').href = 'guest-SelectTime.php?selecteddate=' + encodeURIComponent(selectedDateValue) + '&selectedday=' + encodeURIComponent(dayOfWeek) + '&selectedservice=' + encodeURIComponent(selectedService);
    }
});

</script>

</body>
</html>
