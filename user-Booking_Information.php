
<?php 
    session_start();
    include("user_session.php");

    include("db_connect.php");

    // Retrieve selected date and day
    $selectedDate = isset($_GET['selecteddate']) ? $_GET['selecteddate'] : '';
    $selectedDay = isset($_GET['selectedday']) ? $_GET['selectedday'] : '';
    $selectedservice = isset($_GET['selectedservice']) ? $_GET['selectedservice'] : '';
    $selectedTime = isset($_GET['selectedtime']) ? $_GET['selectedtime'] : '';


    // Create a DateTime object from the selected date
    $date = DateTime::createFromFormat('Y-m-d', $selectedDate);
    
    if ($date !== false) {
        // Format the date to dd-MMM-yyyy
        $formattedDate = $date->format('d-M-Y');
 
    }


    $email = $_SESSION['email'];
    $query = "SELECT * FROM tbl_user WHERE email = '$email'";
    $result = $db_connection->query($query);

    while ($row = $result->fetch_assoc()) {

        $mobile_num = $row['mobile_num'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
    }

    $query2 = "SELECT * FROM tbl_services WHERE service = '$selectedservice'";
    $result2 = $db_connection->query($query2);

    while ($row = $result2->fetch_assoc()) {

        $ServiceDesc = $row['service_description'];
        $ServicePrice = $row['price'];
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
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
            font-family: 'Satisfy', cursive;
            color: #7E007D;

        }
		
        .receipt-container {
            width: 350px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
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
        <label style="color: #7E007F;"><a href="user-homepage.php">Select Service ></a>
        <a href="user-Booking_SelectDate.php?selectedservice=<?php echo urlencode($selectedservice); ?>"> Select a date > </a> 
        <a href="user-Booking_SelectTime.php?selectedservice=<?php echo urlencode($selectedservice); ?>&selectedday=<?php echo urlencode($selectedDay); ?>&selecteddate=<?php echo urlencode($selectedDate); ?>"> Select time > </a> 
            <b> Information > </b></label>
        <label style="color: rgba(116, 116, 116, 0.67);">  Confirmation</label>
        <br><br>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-9">
                            <div class="receipt-container">
                                <h2>Name: <span><?php echo $firstname . " " . $lastname ?></span></h2>
                                <p>Email: <span><?php echo $_SESSION['email']?></span></p>
                                <p>Mobile: <span><?php echo $mobile_num ?></span></p>
                                <hr><br>
                                <div class="service-description">
                                    <span class="service-name"><?php echo $selectedservice; ?></span>
                                    <span class="service-price">A$<?php echo $ServicePrice ?></span></span>
                                </div>
                                <br>
                                <p><?php echo $ServiceDesc ?></p>
                                <br>
                                <div class="services">
                                    <span>DATE:</span>
                                    <span><?php echo $formattedDate?></span>
                                </div>
                                <div class="services">
                                    <span>TIME:</span>
                                    <span><?php echo $selectedTime?></span>
                                </div>
                                <br><hr>
                                <div class="total-price">
                                    <span>Total price</span>
                                    <span>A$<?php echo $ServicePrice ?></span>
                                </div>
                            </div><br>
                                <div class="well">

                                    <div class="d-flex justify-content-between">
                                        
                                        <a href="user-Booking_SelectTime.php?selectedservice=<?php echo urlencode($selectedservice); ?>&selectedday=<?php echo urlencode($selectedDay); ?>&selecteddate=<?php echo urlencode($selectedDate); ?>" class="btn btn-outline-primary btn-lg rounded w-lg mt-3">Back</a>

                                            <form action="user-BookingConfirmation_process.php" method="POST">
                                                <!-- Include hidden fields to pass the necessary data -->
                                                <input type="hidden" name="selectedservice" value="<?php echo $selectedservice; ?>">
                                                <input type="hidden" name="selecteddate" value="<?php echo $selectedDate; ?>">
                                                <input type="hidden" name="selectedtime" value="<?php echo $selectedTime; ?>">
                                                <input type="hidden" name="serviceprice" value="<?php echo $ServicePrice; ?>">
                                                <input type="hidden" name="servicedesc" value="<?php echo $ServiceDesc; ?>">
                                                
                                                <button type="submit" class="btn btn-primary btn-lg rounded w-lg mt-3">Confirm Booking</button>
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

document.querySelectorAll('.time-picker button').forEach(button => {
        button.addEventListener('click', function() {
            // Remove 'selected' class from all buttons
            document.querySelectorAll('.time-picker button').forEach(btn => btn.classList.remove('selected'));
            // Add 'selected' class to the clicked button
            this.classList.add('selected');
        });
    });
</script>
