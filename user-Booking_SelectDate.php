
<?php 
    session_start();
    include("user_session.php");

?>

<!doctype html>
<html lang="en">
  <head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6858343273703359"
     crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Glow in Wellness - Admin Dashboard</title>

		<!-- Bootstrap CSS-->
        <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
        <!-- Style CSS (White)-->
        <link rel="stylesheet" href="assets/css/White.css">
        <!-- Style CSS (Dark)-->
        <link rel="stylesheet" href="assets/css/Dark.css">
        <!-- FontAwesome CSS-->
        <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
        <!-- Icon LineAwesome CSS-->
        <link rel="stylesheet" href="assets/vendors/lineawesome/css/line-awesome.min.css">
        <link rel="stylesheet" href="assets/css/leadmark.css">
<link rel="stylesheet" href="CSS/topbar.css">
        <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/leadmark.css">

        


	<style>
		.topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.left-items {
			display: flex;
			align-items: center;
		}
		.date-display {
			margin-right: 20px;
			color: #ffffff; /* Adjust color as needed */
		}
		.date-label {
			margin-right: 5px;
		}

        .sectitle {
            font-family: 'Sacramento', cursive;
            color: #7E007D;

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
<body>
  
<!--Topbar -->
<?php include("user-topbar.php");?>

		<!--Sidebar-->
        <?php include("user-sidebar.php");?>

        
	<!--Content Start-->
	<div class="content transition text-center">
		<div class="container-fluid dashboard">
            <label style="color: #7E007F;" ><a href="user-homepage.php">Select Service ></a> 
            <b> Select a date > </b></label> 
            <label style="color: rgba(116, 116, 116, 0.67);" > Select time > Summary > Confirmation</label>
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
                                                <a href="user-homepage.php" class="btn btn-outline-primary btn-lg rounded w-100 mx-1 mt-3">Back</a>
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

	<!-- Footer -->
	<div class="footer transition">
		<hr>
		<p class="mb-0 small text-center">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved </p> 
	</div>

	<!-- Loader -->
	<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div class="loader-overlay"></div>

	<!-- Library Javascipt-->
	<script src="assets/vendors/bootstrap/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
	<script src="assets/js/script.js"></script>
 </body>
</html>

<script>
// JavaScript to insert the current date
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var dateString = today.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById('current-date').textContent = dateString;
});

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
        document.getElementById('next-button-desktop').href = 'user-Booking_SelectTime.php?selecteddate=' + encodeURIComponent(this.value) + '&selectedday=' + encodeURIComponent(dayOfWeek) + '&selectedservice=' + encodeURIComponent(selectedService);
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
        document.getElementById('next-button-mobile').href = 'user-Booking_SelectTime.php?selecteddate=' + encodeURIComponent(selectedDateValue) + '&selectedday=' + encodeURIComponent(dayOfWeek) + '&selectedservice=' + encodeURIComponent(selectedService);
    }
});



</script>
