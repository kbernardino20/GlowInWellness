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
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
            font-family: 'Satisfy', cursive;
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

        .pagination a, .pagination span {
    background-color: white; /* Inactive button background */
    color: #5b004b; /* Text color for inactive button */
    border-radius: 5px;
    padding: 5px 12px; /* Adjust padding for better sizing */
    margin: 0 4px; /* Slightly increase margin for better spacing */
    font-size: 14px; /* Consistent font size */
    text-decoration: none;
    border: 1px solid #5b004b; /* Border for structure */
    display: inline-block; /* Ensure that pagination items don't collapse */
    min-width: 35px; /* Ensure minimum width for the buttons */
    text-align: center; /* Center the text within the button */
}

.pagination a:hover {
    background-color: #7e007f; /* Hover color */
    color: white; /* Text color on hover */
    transition: background-color 0.3s ease; /* Smooth hover transition */
}

.pagination .btn-primary {
    background-color: #7e007f; /* Active page color */
    color: white;
    border-radius: 5px;
    padding: 5px 12px; /* Keep consistent padding */
    font-size: 14px; /* Consistent font size */
    border: 1px solid #7e007f; /* Border same as background */
    min-width: 35px; /* Ensure minimum width for the buttons */
}

.pagination {
    display: inline-flex; /* Align pagination items horizontally */
    list-style-type: none;
    padding: 0;
}

.pagination a, .pagination .btn-primary {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
}
	</style>
    
</head>
<body>
  
<!--Topbar -->
<?php include("user-topbar.php");?>

		<!--Sidebar-->
        <?php include("user-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">

        <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Transaction <b>History</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <!-- Filter form -->
                        <form method="POST" class="form-inline">
                            <label for="filter">Filter by:</label>
                            <select name="filter_type" class="form-control mx-2" id="filter" onchange="showFilterInputs()">
                                <option value="daily">Daily</option>
                                <option value="monthly" selected>Monthly</option> <!-- Monthly set as default -->
                                <option value="yearly">Yearly</option>
                            </select>
                            <!-- Daily Date Picker -->
                            <input type="date" name="selected_date" class="form-control mx-2" id="daily-input" max="<?php echo date('Y-m-d'); ?>" style="display: none;">
                            <!-- Monthly Input (default visible) -->
                            <input type="month" name="selected_month" class="form-control mx-2" id="monthly-input" max="<?php echo date('Y-m'); ?>">
                            <!-- Year Input -->
                            <input type="number" name="selected_year" class="form-control mx-2" placeholder="Enter Year" min="2000" max="<?php echo date('Y'); ?>" id="yearly-input" style="display: none;">
                            <button type="submit" class="btn btn-primary mx-2">Filter</button>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover w-100">
            <?php
include("db_connect.php");
$email = $_SESSION['email'];

// Default values for pagination
$records_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page or default to 1
$offset = ($current_page - 1) * $records_per_page; // Calculate the offset

// Initialize variables for filters to prevent undefined variable errors
$selected_date = isset($_GET['selected_date']) ? $_GET['selected_date'] : '';
$selected_month = isset($_GET['selected_month']) ? $_GET['selected_month'] : '';
$selected_year = isset($_GET['selected_year']) ? $_GET['selected_year'] : '';
$filter_type = isset($_POST['filter_type']) ? $_POST['filter_type'] : (isset($_GET['filter_type']) ? $_GET['filter_type'] : 'monthly'); // Default filter type is monthly

// Default query to show the current month's bookings
$current_month = date('Y');
$query = "SELECT * FROM tbl_bookinghistory 
          WHERE email = '$email' AND DATE_FORMAT(STR_TO_DATE(Appointment_date, '%d/%m/%Y'), '%Y') = '$current_month' 
          ORDER BY STR_TO_DATE(Appointment_date, '%d/%m/%Y') DESC";

$filter_message = "Your total booking for the Year " . date('Y') . " is "; // Default filter message

// Check if a filter was applied
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['filter_type'])) {
    // Use POST for first request, GET for page switching
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filter_type = $_POST['filter_type'];
        $selected_date = $_POST['selected_date'] ?? '';
        $selected_month = $_POST['selected_month'] ?? '';
        $selected_year = $_POST['selected_year'] ?? '';
    }

    // Daily filter
    if ($filter_type === 'daily' && !empty($selected_date)) {
        // Validate and format the selected date
        $selected_date = date("d/m/Y", strtotime($selected_date));
        $query = "SELECT * FROM tbl_bookinghistory 
                  WHERE email = '$email' AND Appointment_date = '$selected_date' 
                  ORDER BY STR_TO_DATE(Appointment_date, '%d/%m/%Y') DESC";
        $filter_message = "Your booking on " . $selected_date . " is ";
    }
    // Monthly filter
    elseif ($filter_type === 'monthly' && !empty($selected_month)) {
        $selected_month_formatted = date("m/Y", strtotime($selected_month));
        $query = "SELECT * FROM tbl_bookinghistory 
                  WHERE email = '$email' AND DATE_FORMAT(STR_TO_DATE(Appointment_date, '%d/%m/%Y'), '%m/%Y') = '$selected_month_formatted' 
                  ORDER BY STR_TO_DATE(Appointment_date, '%d/%m/%Y') DESC";
        $filter_message = "Your total booking for the month of " . date('F Y', strtotime($selected_month)) . " is ";
    }
    // Yearly filter
    elseif ($filter_type === 'yearly' && !empty($selected_year)) {
        $query = "SELECT * FROM tbl_bookinghistory 
                  WHERE email = '$email' AND YEAR(STR_TO_DATE(Appointment_date, '%d/%m/%Y')) = '$selected_year' 
                  ORDER BY STR_TO_DATE(Appointment_date, '%d/%m/%Y') DESC";
        $filter_message = "Your total booking for the Year " . $selected_year . " is ";
    }
}

// Query to count Completed, No Show, and Cancelled records (before adding LIMIT)
$count_query = "SELECT 
                SUM(status = 'Completed') AS completed_count, 
                SUM(status = 'No show') AS no_show_count, 
                SUM(status = 'Cancelled') AS cancelled_count 
                FROM tbl_bookinghistory 
                WHERE email = '$email' AND DATE_FORMAT(STR_TO_DATE(Appointment_date, '%d/%m/%Y'), '%Y') = '$current_month'"; // Apply the current month filter

// Modify the count query based on the applied filters
if ($filter_type === 'daily' && !empty($selected_date)) {
    $count_query = "SELECT 
                    SUM(status = 'Completed') AS completed_count, 
                    SUM(status = 'No show') AS no_show_count, 
                    SUM(status = 'Cancelled') AS cancelled_count 
                    FROM tbl_bookinghistory 
                    WHERE email = '$email' AND Appointment_date = '$selected_date'";
} elseif ($filter_type === 'monthly' && !empty($selected_month)) {
    $selected_month_formatted = date("m/Y", strtotime($selected_month));
    $count_query = "SELECT 
                    SUM(status = 'Completed') AS completed_count, 
                    SUM(status = 'No show') AS no_show_count, 
                    SUM(status = 'Cancelled') AS cancelled_count 
                    FROM tbl_bookinghistory 
                    WHERE email = '$email' AND DATE_FORMAT(STR_TO_DATE(Appointment_date, '%d/%m/%Y'), '%m/%Y') = '$selected_month_formatted'";
} elseif ($filter_type === 'yearly' && !empty($selected_year)) {
    $count_query = "SELECT 
                    SUM(status = 'Completed') AS completed_count, 
                    SUM(status = 'No show') AS no_show_count, 
                    SUM(status = 'Cancelled') AS cancelled_count 
                    FROM tbl_bookinghistory 
                    WHERE email = '$email' AND YEAR(STR_TO_DATE(Appointment_date, '%d/%m/%Y')) = '$selected_year'";
}

// Run the count query
$count_result = $db_connection->query($count_query);
$counts = $count_result->fetch_assoc();

$completed_count = $counts['completed_count'] ?? 0; // Ensure it defaults to 0 if no result
$no_show_count = $counts['no_show_count'] ?? 0;
$cancelled_count = $counts['cancelled_count'] ?? 0;

// Count the total number of filtered records
$result_count = $db_connection->query($query);
$total_filtered_records = mysqli_num_rows($result_count);

// Add LIMIT for pagination
$query .= " LIMIT $offset, $records_per_page";
$result = $db_connection->query($query);

if ($result) {
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<thead>
                <tr>
                    <th style='color: #7E007F; min-width: 150px;'>Booking No.</th>
                    
                    <th style='color: #7E007F; min-width: 200px;'>Appointment Date</th>
                    <th style='color: #7E007F; min-width: 400px'>Service</th>
                    <th style='color: #7E007F;'>Price</th>
                    <th style='color: #7E007F;'>Status</th>
                    <th style='color: #7E007F; min-width: 80px;'>Action</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['Ref_No']."</td>
                    
                    <td>".$row['Appointment_date']."</td>
                    <td>".$row['services']."</td>
                    <td>A$".$row['price']."</td>
                    <td>".$row['status']."</td>
                    <td style='width: 200px;'>
                        <a href='user-view_appointmentHist.php?Ref_No=".urlencode($row['Ref_No'])."' class='settings' title='View Booking' data-toggle='tooltip'><i class='material-icons'>&#xE8F4;</i></a>
                    </td>
                </tr>";
        }

        echo "</tbody>";

        // Pagination logic
        $total_pages = ceil($total_filtered_records / $records_per_page);

        echo "<tfoot>";

        // Pagination on the right and showing records on the left
        echo "<tr>
                <td colspan='6'>
                    <div class='d-flex justify-content-between'>
                        <div>
                            <span>Showing <b>".($offset + 1)."</b> to <b>".min($offset + $records_per_page, $total_filtered_records)."</b> of <b>$total_filtered_records</b> total records</span>
                        </div>
                        <div class='pagination'>"; // Pagination aligned to the right

        if ($current_page > 1) {
            echo "<a href='?page=".($current_page - 1)."&filter_type=$filter_type&selected_date=$selected_date&selected_month=$selected_month&selected_year=$selected_year' class='btn btn-secondary' style='background-color: white; color: #5b004b;'>Previous</a> ";
        }

        for ($page = 1; $page <= $total_pages; $page++) {
            if ($page == $current_page) {
                echo "<span class='btn btn-primary' style='background-color: #7e007f; color: white;'>$page</span> "; // Active page with primary styling
            } else {
                echo "<a href='?page=$page&filter_type=$filter_type&selected_date=$selected_date&selected_month=$selected_month&selected_year=$selected_year' class='btn btn-secondary' style='background-color: white; color: #5b004b;'>$page</a> "; // Inactive pages with updated color styling
            }
        }

        if ($current_page < $total_pages) {
            echo "<a href='?page=".($current_page + 1)."&filter_type=$filter_type&selected_date=$selected_date&selected_month=$selected_month&selected_year=$selected_year' class='btn btn-secondary' style='background-color: white; color: #5b004b;'>Next</a>";
        }

        echo "        </div>
                    </div>
                </td>
            </tr>";

        // Show total bookings count above the <hr> and status counts
        echo "<tr>
                <td colspan='6' class='text-center'>
                    
                    <b style='font-size: 24px;'>$filter_message $total_filtered_records</b>
                    <hr style='border: 1px solid #7E007F; width: 50%; margin: 0 auto;'>
                    <b style='font-size: 20px;'>Completed: $completed_count | No Show: $no_show_count | Cancelled: $cancelled_count</b>
                </td>
              </tr>";

        echo "</tfoot>";

    } else {
        echo "<tr><td colspan='6' class='text-center' style='color: #7E007F; font-size: 20px; padding: 50px;'>No bookings found</td></tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center' style='color: #7E007F; font-size: 20px; padding: 50px;'>No bookings found</td></tr>";
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

function showFilterInputs() {
    var filterType = document.getElementById('filter').value;
    
    // Hide all the inputs initially
    document.getElementById('daily-input').style.display = 'none';
    document.getElementById('monthly-input').style.display = 'none';
    document.getElementById('yearly-input').style.display = 'none';
    
    // Show the relevant input based on the selected filter type
    if (filterType === 'daily') {
        document.getElementById('daily-input').style.display = 'block';
    } else if (filterType === 'monthly') {
        document.getElementById('monthly-input').style.display = 'block';
    } else if (filterType === 'yearly') {
        document.getElementById('yearly-input').style.display = 'block';
    }
}

// Ensure the correct input is shown by default when the page loads
document.addEventListener('DOMContentLoaded', function() {
    showFilterInputs();
});
</script>
