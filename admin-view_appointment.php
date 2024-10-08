
<?php 
    session_start();
    include("admin_session.php");


    include("db_connect.php");
    if (isset($_GET['BookingNo']))  {

        $BookingNo = urldecode($_GET['BookingNo']);
        $ViewBack = urldecode($_GET['ViewBack']);

        // Step 1: Search the record in tbl_bookingappointment
        $search_query = "SELECT * FROM tbl_bookingappointment WHERE Ref_No = '$BookingNo'";
        $result = $db_connection->query($search_query);

        if ($result->num_rows > 0) {
            // Fetch the record
            $row = $result->fetch_assoc();
            $Appointment_date = $row['Appointment_date'];
            $Appointment_time = $row['Appointment_time'];
            $service = $row['services'];
            $price = $row['Price'];
            $status = $row['Status'];
            $Cname = $row['name'];
            $email = $row['email'];
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
<link rel="stylesheet" href="CSS/topbar-admin.css">
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
		

</style>

</head>
<body>
  
<!--Topbar -->
<?php include("admin-topbar.php");?>

		<!--Sidebar-->
        <?php include("admin-sidebar.php");?>


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
                                                <label style="color: #7E007F;" for="CustName">Customer Name</label>
                                                <input type="text" class="form-control" name="CustName" value="<?php echo $Cname ?>" disabled>
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
                                                <a href="<?php echo $ViewBack ?>" class="btn btn-primary btn-lg rounded w-lg mt-3">Close</a>

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
