
<?php 
    session_start();
    include("user_session.php");

    include("db_connect.php");

    $times = ['09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '01:00 PM'];

    // Retrieve selected date and day
    $selectedDate = isset($_GET['selecteddate']) ? $_GET['selecteddate'] : '';
    $selectedDay = isset($_GET['selectedday']) ? $_GET['selectedday'] : '';
    $selectedservice = isset($_GET['selectedservice']) ? $_GET['selectedservice'] : '';

    // Split the date into an array
    // $dateParts = explode('-', $selectedDate);

    // Assign the day, month, and year to variables
    // $year = $dateParts[0];  // 2024
    // $month = $dateParts[1]; // 09
    // $day = $dateParts[2];   // 26

    // $dbDATE = $month ."/". $day ."/". $year;

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
        <label style="color: #7E007F;"><a href="user-homepage.php">Select Service ></a><a href="user-Booking_SelectDate.php?selectedservice=<?php echo urlencode($selectedservice); ?>"> Select a date > </a>
            <b> Select time ></b></label>
        <label style="color: rgba(116, 116, 116, 0.67);"> Information > Confirmation</label>
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
                                                        <a href="user-Booking_SelectDate.php?selectedservice=<?php echo urlencode($selectedservice); ?>" class="btn btn-outline-primary btn-lg rounded me-2 w-50">Back</a>
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

                this.href = `user-Booking_Information.php?selectedservice=${selectedService}&selecteddate=${selectedDate}&selectedday=${selectedDay}&selectedtime=${encodeURIComponent(selectedTimeValue)}`;
            }
        });

    
</script>
