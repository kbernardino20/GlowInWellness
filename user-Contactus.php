
<?php 
    session_start();
    include("user_session.php");

    include("input-validation.php"); 
    
    if (isset($_POST['submit'])) {
        // Set database connection
        include("db_connect.php");
    
        // INPUT VALIDATION - Check each input in the registration form
        $name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $message = mysqli_real_escape_string($db_connection, $_POST['message']);
        $subject = mysqli_real_escape_string($db_connection, $_POST['subject']);
        $markread = "unread";
        $date_received = date('d/m/Y');
        $msg_id = "WELL" . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
    
        $query = "INSERT INTO tbl_messages (msg_id, name, email, subject, messages, markread, date_received)
                  VALUES ('$msg_id' , '$name', '$email', '$subject', '$message', '$markread', '$date_received')";
    
        if (mysqli_query($db_connection, $query)) {
            echo "<script>
                    alert('Your message has been sent! We will contact you as soon as possible!');
                    window.location.href='user-Contactus.php';
                </script>";
        } else {
            echo "<script>
                    alert('There was an error sending your message. Please try again.');
                    window.location.href='user-Contactus.php';
                </script>";
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
        #contactMessageBot {
            width: 100%; /* Full width */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            min-height: 300px; /* Adjust the height here */
            resize: vertical; /* Allow vertical resizing */
            font-size: 16px; /* Font size inside the textarea */
            box-sizing: border-box; /* Include padding and borders in the width */
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
                <h6 class="mb-0 " style="font-size: 50px; font-family: 'Satisfy', cursive; color: #7E007F;">Contact Us</h6> <br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        <div class="well">
                                            <br>
                                            <form method="post">
                                                <label for="current_password">Subject</label>
                                                <input type="text" class="form-control rounded-0 bg-transparent" name="subject" placeholder="Subject*" required>
                                                <br>
                                                
                                                <label for="new_password">Message</label>
                                            
                                                <textarea name="message" id="contactMessageBot" cols="30" rows="4" class="form-control rounded-0 bg-transparent" placeholder="Message*" required></textarea>
                                                <br>

                                                
                                                <input type="submit" class="btn btn-primary btn-lg rounded w-lg mt-3" value="Send" name="submit">
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
