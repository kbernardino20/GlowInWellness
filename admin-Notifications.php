<?php 
    session_start();
    include("admin_session.php");

	    // Check if the 'alert' key exists in the URL
        if (isset($_GET['alert'])) {
            // Retrieve and decode the alert message from the URL
            $alertMessage = urldecode($_GET['alert']);
        
            // Escape the alert message to prevent XSS attacks
            $safeAlertMessage = htmlspecialchars($alertMessage, ENT_QUOTES, 'UTF-8');
        
            // Display the alert message using JavaScript
            echo "<script>alert('$safeAlertMessage');</script>";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

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
		

        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #7E007F;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn {
            color: #7E007F;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn:hover, .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #7E007F;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {

            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.settings {
            color: #2196F3;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }
        .text-success {
            color: #10c469;
        }
        .text-info {
            color: #62c9e8;
        }
        .text-warning {
            color: #FFC107;
        }
        .text-danger {
            color: #ff5b5b;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }	
        .pagination li.active a, .pagination li.active a.page-link {
            background: #7E007F;
        }
        .pagination li.active a:hover {        
            background: #ff00ff;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        </style>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>
<body>
  
<!--Topbar -->
<?php include("admin-topbar.php");?>

		<!--Sidebar-->
        <?php include("admin-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">
                
				<div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title text-center">
                            <h2>Please update the status of below appointments</h2>
                            </div>
                            <table class="table table-striped table-hover">
                                <?php
                                    include("db_connect.php");
                                    $email = $_SESSION['email'];
                                    date_default_timezone_set('Australia/Sydney');
                                    $today_date = date('d/m/Y');
                                    $query = "SELECT * FROM tbl_bookingappointment 
                                        WHERE STR_TO_DATE(Appointment_date, '%d/%m/%Y') < STR_TO_DATE('$today_date', '%d/%m/%Y') 
                                        AND Status = 'Confirmed'";
                                    $result = $db_connection->query($query);

                                    if ($result && $result->num_rows > 0) {
                                        echo '<thead>
                                                <tr>
                                                    <th style="color: #7E007F;">Booking No</th>
                                                    <th style="color: #7E007F;">Customer name</th>
                                                    <th style="color: #7E007F;">Appointment date</th>
                                                    <th style="color: #7E007F;">Time</th>
                                                    <th style="color: #7E007F;">Services</th>
                                                    <th style="color: #7E007F;">Price</th>
                                                    
                                                    <th style="color: #7E007F;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>".$row['Ref_No']."</td>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['Appointment_date']."</td>
                                                    <td>".$row['Appointment_time']."</td>
                                                    <td>".$row['services']."</td>                        
                                                    <td>A$".$row['Price']."</td>
                                                    
                                                    <td style='display: flex; gap: 10px;'>
                                                        <a href='admin-confirm_booking.php?ordernum=".urlencode($row['Ref_No'])."&SuccessBack=admin-Notifications.php' class='confirm' title='Completed' data-toggle='tooltip'>
                                                            <i class='material-icons' style='color: green;'>&#xE8DC;</i>
                                                        </a>
                                                        <a href='admin-confirm_noShow.php?BookingNo=" . urlencode($row['Ref_No']) . "&ViewBack=admin-Notifications.php' 
                                                            class='confirm' 
                                                            title='No Show' 
                                                            data-toggle='tooltip'
                                                            onclick='return confirm(\"Are you sure you want to update the status to No Show?\");'>
                                                                <i class='material-icons' style='color: #bcad09;'>visibility_off</i>
                                                        </a>


                                                        <a href=\"javascript:void(0);\" onclick=\"if(confirm('Are you sure you want to cancel this appointment?')) { window.location.href='admin-delete_appointment.php?BookingNo=".urlencode($row['Ref_No'])."&DelBack=admin-Notifications.php'; }\" class='delete' title='Cancel appointment' data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a>
                                                        
                                                    
                                                    </td>

                                                </tr>";
                                        }
                                        echo '</tbody>';
                                    } else {
                                        echo "<tbody><tr><td colspan='7' style='text-align:center;'><b>You do not have any notifications</b></td></tr></tbody>";
                                    }
                                ?>
                            </table>

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

document.getElementById('search-button').addEventListener('click', function() {
        var datePicker = document.getElementById('date-picker').value;
        if (datePicker) {
            // Convert the date to dd/mm/yyyy format
            var dateParts = datePicker.split("-");
            var formattedDate = dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];
            
            this.href = 'admin-BookingAppointments_Date.php?selectedDate=' + formattedDate;
        } else {
            alert('Please select a date before searching.');
        }
    });
</script>
