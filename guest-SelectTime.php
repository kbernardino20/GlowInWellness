<?php

include("db_connect.php");

$times = ['09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '01:00 PM'];

// Retrieve selected date, day, and service
$selectedDate = isset($_GET['selecteddate']) ? $_GET['selecteddate'] : '';
$selectedDay = isset($_GET['selectedday']) ? $_GET['selectedday'] : '';
$selectedservice = isset($_GET['selectedservice']) ? $_GET['selectedservice'] : '';

// Initialize an array to store disabled times
$disabledTimes = [];

// Fetch the duration of the selected service
$serviceDuration = 0;
$searchDuration_query = "SELECT * FROM tbl_services WHERE service = '$selectedservice'";
$Durationresult = $db_connection->query($searchDuration_query);

while ($row = $Durationresult->fetch_assoc()) {
    $serviceDuration = intval(trim($row['duration'])) - 1; // Subtract 1 minute from the duration
}

if ($selectedDate && $serviceDuration > 0) {
    // Convert the selected date to the format used in the database (dd/mm/yyyy)
    $formattedDate = date("d/m/Y", strtotime($selectedDate));

    // Query to check if there are any appointments on the selected date
    $search_query = "SELECT * FROM tbl_bookingappointment WHERE Appointment_date = '$formattedDate'";
    $result = $db_connection->query($search_query);

    // Store the appointment times in the array and calculate overlapping times
    while ($row = $result->fetch_assoc()) {
        $appointmentTime = trim($row['Appointment_time']);
        $existingServiceDuration = intval(trim($row['duration'])) - 1; // Subtract 1 minute from existing appointment duration
        $disabledTimes[] = $appointmentTime;

        // Calculate the end time of the existing appointment
        $appointmentStartTime = strtotime($appointmentTime);
        $appointmentEndTime = strtotime("+$existingServiceDuration minutes", $appointmentStartTime);

        // Disable all time slots that overlap with the existing appointment
        foreach ($times as $time) {
            $slotStartTime = strtotime($time);
            $slotEndTime = strtotime("+$serviceDuration minutes", $slotStartTime);

            if (
                ($slotStartTime >= $appointmentStartTime && $slotStartTime < $appointmentEndTime) ||
                ($slotEndTime > $appointmentStartTime && $slotEndTime <= $appointmentEndTime)
            ) {
                $disabledTimes[] = $time;
            }
        }
    }
}

// Additional condition: If the selected day is Friday, disable 9:00 AM to 11:30 AM
if ($selectedDay == 'Friday') {
    $disabledTimes = array_merge($disabledTimes, ['09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM']);
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
        <label style="color: #7E007F;">
        Select Service > Select a date >
        </label>
        <label style="color: #ffffff;">
            <a href="#" style="color: #ffffff; text-decoration: none;"><b>  Select time > </b></a>
        </label>
            <label style="color: rgba(116, 116, 116, 0.67);" > Information > Summary > Confirmation</label>
            <br><br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                    <div class="well">
                                            <div>
                                                <label style="color: #7E007F;" for="date-picker">Select time:</label>
                                                <br>
                                                <div class="time-picker">
                                                        <?php 
                                                                // $times = ['09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '01:00 PM'];
                                                                foreach($times as $time) {
                                                                    $disabled = in_array($time, $disabledTimes) ? 'disabled' : '';
                                                                    echo "<button class='time-button' data-time='$time' $disabled>$time</button>";
                                                                }
                                                            ?>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-3">
                                                        <a href="guest-SelectDate.php?selectedservice=<?php echo urlencode($selectedservice); ?>" class="btn btn-outline-primary btn-lg rounded me-2 w-50">Back</a>
                                                        <a id="next-button" href="#" class="btn btn-primary btn-lg rounded ms-2 w-50">Next</a>
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
    document.querySelectorAll('.time-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.time-button').forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        document.getElementById('next-button').addEventListener('click', function(event) {
            const selectedTime = document.querySelector('.time-button.selected');
            if (!selectedTime) {
                alert('Please select a time before proceeding.');
                event.preventDefault();
            } else {
                const selectedTimeValue = selectedTime.getAttribute('data-time');
                const selectedService = "<?php echo urlencode($selectedservice); ?>";
                const selectedDate = "<?php echo urlencode($selectedDate); ?>";
                const selectedDay = "<?php echo urlencode($selectedDay); ?>";

                this.href = `guest-Information.php?selectedservice=${selectedService}&selecteddate=${selectedDate}&selectedday=${selectedDay}&selectedtime=${encodeURIComponent(selectedTimeValue)}`;
            }
        });
    </script>

</body>
</html>
