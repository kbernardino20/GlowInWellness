
<?php 
    session_start();
    include("user_session.php");
    $orderNumber = isset($_GET['orderNumber']) ? $_GET['orderNumber'] : '';
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
        <label style="color: #7E007F;">Select Service >
         Select a date > 
         Select time > 
         Information >
            <b> Confirmation </b></label>

        <br><br>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-9 col-md-7 col-lg-5">
                                <div class="text-center p-3" style="font-family: Arial, sans-serif; background-color: #f8f8f8; border-radius: 10px; margin: 0 auto;">
                                    <div style="font-size: 80px; color: #4CAF50;">&#10004;</div><br>
                                    <div style="font-size: 20px; color: #333;">Thank you for your request!</div><br>
                                    <div style="font-size: 14px; color: #777;">Your confirmation number:</div>
                                    <div style="font-size: 30px; color: #333; font-weight: bold;"><?php echo $orderNumber ?></div>
                                </div><br>
                                <div class="text-center">
                                    <a href="user-homepage.php" class="btn btn-outline-primary btn-lg rounded w-100 mt-3">Start new Booking</a>
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
