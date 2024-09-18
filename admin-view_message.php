
<?php 
    session_start();
    include("admin_session.php");

    include("db_connect.php");

    // Retrieve selected date and day
    
    $msg_id = urldecode($_GET['msg_id']);
    // Sanitize the input to prevent SQL injection
    $msg_id = mysqli_real_escape_string($db_connection, $msg_id);


    $query4 = "SELECT * FROM tbl_messages WHERE msg_id = '$msg_id'";
    $result4 = $db_connection->query($query4);

    while ($row = $result4->fetch_assoc()) {
        $subject = $row['subject'];
        $email = $row['email'];
        $name = $row['name'];
        $messages = $row['messages'];
        $date_received = $row['date_received'];
    }

    $sql = "UPDATE tbl_messages SET markread = 'read' WHERE msg_id = ?";
    $stmt = $db_connection->prepare($sql);
    $stmt->bind_param("s", $msg_id);
    $stmt->execute();
    $stmt->close();

                            
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
            width: 600px;
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
<?php include("admin-topbar.php");?>

		<!--Sidebar-->
        <?php include("admin-sidebar.php");?>

        
<!--Content Start-->
<div class="content transition text-center">
    <div class="container-fluid dashboard">
        
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
            <div class="col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-9">
                            <div class="receipt-container">
                                <br>
                                <h2>From: <br><b><?php echo $name ?></b></h2>
                                <br>
                                <p>Email: <span><?php echo $email?></span></p>
                                <p>Date: <span><?php echo $date_received ?></span></p>

                                <br>
                                <hr>
                                <br>
                                <p><b>Subject: <br><h2><?php echo $subject ?></h2></b></p>
                                <br>
                                <p><span><?php echo $messages ?></span></p>
                                    
                            <br><hr>
                            <br>
                            </div>
                            <br>
                            
                                <div class="well">
                                                <div class="d-flex justify-content-center">
                                                    <a href="admin-Messages.php" class="btn btn-outline-primary btn-lg rounded w-lg mt-3">Back</a>
                                                    <a href="admin-delete_messages.php?Ref_No=<?php echo $msg_id; ?>" class="btn btn-primary btn-lg rounded w-lg mt-3">Delete</a>
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
