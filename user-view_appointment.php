
<?php 
    session_start();
    include("user_session.php");


    include("db_connect.php");
    if (isset($_GET['Appointment_date']) && isset($_GET['Appointment_time']))  {
        // Decode the appointment date and time in case they contain special characters
        $Appointment_date = urldecode($_GET['Appointment_date']);
        $Appointment_time = urldecode($_GET['Appointment_time']);
    

        $email = $_SESSION['email'];
        // Step 1: Search the record in tbl_bookingappointment
        $search_query = "SELECT * FROM tbl_bookingappointment WHERE Appointment_time = '$Appointment_time' AND Appointment_date = '$Appointment_date' AND email = '$email'";
        $result = $db_connection->query($search_query);

        if ($result->num_rows > 0) {
            // Fetch the record
            $row = $result->fetch_assoc();

            $service = $row['services'];
            $price = $row['Price'];
            $status = $row['Status'];
        }
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
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        <div class="well">
                                                <br>
                                                <label style="color: #7E007F;" for="Appointment_date">Appointment Date</label>
                                                <input type="text" class="form-control" name="Appointment_date" value="<?php echo $Appointment_date ?>" disabled>
                                                <br>
                                                <label style="color: #7E007F;" for="Appointment_time">Appointment Time</label>
                                                <input type="text" class="form-control" name="Appointment_time" value="<?php echo $Appointment_time ?>" disabled>
                                                <br>
                                                <label style="color: #7E007F;" for="Service">Service</label>
                                                <input type="text" class="form-control" name="Service" value="<?php echo $service ?>" disabled>
                                                <br>
                                                <label style="color: #7E007F;" for="price">Price</label>
                                                <input type="text" class="form-control" name="price" value="A$<?php echo $price ?>" disabled>
                                                <br>
                                                <label style="color: #7E007F;" for="status">Status</label>
                                                <input type="text" class="form-control" name="status" value="<?php echo $status ?>" disabled>
                                                <br>
                                                <a href="user-MyAppointments.php" class="btn btn-primary btn-lg rounded w-lg mt-3">Close</a>

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
</script>
