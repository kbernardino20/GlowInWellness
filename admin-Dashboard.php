<?php 
    session_start();
    include("admin_session.php");

// Database connection
include("db_connect.php"); // Make sure you include the database connection

// Initialize variables
$totalServiceSales = 0; // For service sales from tbl_adminbookinghistory
$totalOrderSales = 0;   // For order sales from tbl_orderhistory
$totalFilteredRecords = 0; // Count of filtered records
$totalRegisteredUsers = 0; // Count of registered users

// Get the current year and month for the default query
$currentYear = date('Y');
$currentMonth = date('m');

// Default query for current month sales and user registrations where status is "Completed"
$defaultMonth = "%".$currentMonth."/".$currentYear; // Format as %mm/yyyy

// Query for tbl_adminbookinghistory (service sales)
$queryServiceSales = "SELECT SUM(price) AS total_sales, COUNT(*) AS record_count 
                      FROM tbl_adminbookinghistory 
                      WHERE Appointment_date LIKE ? AND status = 'Completed'";
$stmtServiceSales = $db_connection->prepare($queryServiceSales);
$stmtServiceSales->bind_param("s", $defaultMonth);

// Query for tbl_orderhistory (order sales)
$queryOrderSales = "SELECT SUM(Total_order) AS total_sales, COUNT(*) AS record_count 
                    FROM tbl_orderhistory 
                    WHERE pickup_date LIKE ? AND status = 'Completed'";
$stmtOrderSales = $db_connection->prepare($queryOrderSales);
$stmtOrderSales->bind_param("s", $defaultMonth);

// Query for tbl_user (registered users)
$queryRegisteredUsers = "SELECT COUNT(*) AS user_count 
                         FROM tbl_user 
                         WHERE date_registered LIKE ?";
$stmtRegisteredUsers = $db_connection->prepare($queryRegisteredUsers);
$stmtRegisteredUsers->bind_param("s", $defaultMonth);

// If form is submitted, override the default query with filter-specific logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected filter type (daily, monthly, yearly)
    $filterType = $_POST['filter_type'];
    
    // Prepare the SQL query based on the selected filter
    if ($filterType == 'daily') {
        // For daily filter
        $selectedDate = $_POST['selected_date']; // yyyy-mm-dd format
        
        // Convert to dd/mm/yyyy format
        $dateParts = explode("-", $selectedDate);
        $formattedDate = $dateParts[2] . "/" . $dateParts[1] . "/" . $dateParts[0]; // Convert to dd/mm/yyyy
        
        // Update queries with daily filter
        $queryServiceSales = "SELECT SUM(price) AS total_sales, COUNT(*) AS record_count 
                              FROM tbl_adminbookinghistory 
                              WHERE Appointment_date = ? AND status = 'Completed'";
        $stmtServiceSales = $db_connection->prepare($queryServiceSales);
        $stmtServiceSales->bind_param("s", $formattedDate);

        $queryOrderSales = "SELECT SUM(Total_order) AS total_sales, COUNT(*) AS record_count 
                            FROM tbl_orderhistory 
                            WHERE pickup_date = ? AND status = 'Completed'";
        $stmtOrderSales = $db_connection->prepare($queryOrderSales);
        $stmtOrderSales->bind_param("s", $formattedDate);

        $queryRegisteredUsers = "SELECT COUNT(*) AS user_count 
                                 FROM tbl_user 
                                 WHERE date_registered = ?";
        $stmtRegisteredUsers = $db_connection->prepare($queryRegisteredUsers);
        $stmtRegisteredUsers->bind_param("s", $formattedDate);
        
    } elseif ($filterType == 'monthly') {
        // For monthly filter
        $selectedMonth = $_POST['selected_month']; // yyyy-mm format
        
        // Extract year and month
        $monthParts = explode("-", $selectedMonth);
        $formattedMonth = "%" . $monthParts[1] . "/" . $monthParts[0]; // Convert to %mm/yyyy
        
        // Update queries with monthly filter
        $queryServiceSales = "SELECT SUM(price) AS total_sales, COUNT(*) AS record_count 
                              FROM tbl_adminbookinghistory 
                              WHERE Appointment_date LIKE ? AND status = 'Completed'";
        $stmtServiceSales = $db_connection->prepare($queryServiceSales);
        $stmtServiceSales->bind_param("s", $formattedMonth);

        $queryOrderSales = "SELECT SUM(Total_order) AS total_sales, COUNT(*) AS record_count 
                            FROM tbl_orderhistory 
                            WHERE pickup_date LIKE ? AND status = 'Completed'";
        $stmtOrderSales = $db_connection->prepare($queryOrderSales);
        $stmtOrderSales->bind_param("s", $formattedMonth);

        $queryRegisteredUsers = "SELECT COUNT(*) AS user_count 
                                 FROM tbl_user 
                                 WHERE date_registered LIKE ?";
        $stmtRegisteredUsers = $db_connection->prepare($queryRegisteredUsers);
        $stmtRegisteredUsers->bind_param("s", $formattedMonth);
        
    } elseif ($filterType == 'yearly') {
        // For yearly filter
        $selectedYear = $_POST['selected_year']; // yyyy format
        
        $formattedYear = "%" . $selectedYear; // Convert to %yyyy
        
        // Update queries with yearly filter
        $queryServiceSales = "SELECT SUM(price) AS total_sales, COUNT(*) AS record_count 
                              FROM tbl_adminbookinghistory 
                              WHERE Appointment_date LIKE ? AND status = 'Completed'";
        $stmtServiceSales = $db_connection->prepare($queryServiceSales);
        $stmtServiceSales->bind_param("s", $formattedYear);

        $queryOrderSales = "SELECT SUM(Total_order) AS total_sales, COUNT(*) AS record_count 
                            FROM tbl_orderhistory 
                            WHERE pickup_date LIKE ? AND status = 'Completed'";
        $stmtOrderSales = $db_connection->prepare($queryOrderSales);
        $stmtOrderSales->bind_param("s", $formattedYear);

        $queryRegisteredUsers = "SELECT COUNT(*) AS user_count 
                                 FROM tbl_user 
                                 WHERE date_registered LIKE ?";
        $stmtRegisteredUsers = $db_connection->prepare($queryRegisteredUsers);
        $stmtRegisteredUsers->bind_param("s", $formattedYear);
    }
}

// Execute all queries
if ($stmtServiceSales->execute()) {
    $resultServiceSales = $stmtServiceSales->get_result();
    $rowServiceSales = $resultServiceSales->fetch_assoc();
    $totalServiceSales = $rowServiceSales['total_sales'] ? $rowServiceSales['total_sales'] : 0;
    $totalFilteredRecords += $rowServiceSales['record_count']; // Add service records to total count
}

if ($stmtOrderSales->execute()) {
    $resultOrderSales = $stmtOrderSales->get_result();
    $rowOrderSales = $resultOrderSales->fetch_assoc();
    $totalOrderSales = $rowOrderSales['total_sales'] ? $rowOrderSales['total_sales'] : 0;
    $totalFilteredRecords += $rowOrderSales['record_count']; // Add order records to total count
}

if ($stmtRegisteredUsers->execute()) {
    $resultRegisteredUsers = $stmtRegisteredUsers->get_result();
    $rowRegisteredUsers = $resultRegisteredUsers->fetch_assoc();
    $totalRegisteredUsers = $rowRegisteredUsers['user_count'] ? $rowRegisteredUsers['user_count'] : 0;
}

// Close the statements
$stmtServiceSales->close();
$stmtOrderSales->close();
$stmtRegisteredUsers->close();
	


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
	<div class="content transition">
    <div class="container-fluid dashboard">
        <!-- Dashboard Header -->
        <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <br><h2 style='color: #7E007F;'><b>Dashboard</b></h2>
                    </div>
                    <div class="col-sm-9">
                        <!-- Filter form -->
                        <form method="POST" class="form-inline">
							<br><br><br>
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

			<br><br>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-6 col-lg-6">
				<a href="admin-ServiceSales.php" style="text-decoration: none;">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <div class="icon-container mb-2">
                            <i class="las la-inbox icon-home bg-primary text-light p-3 rounded-circle"></i>
                        </div>
                        <p class="font-weight-bold text-muted">Total Service Sales</p>
                        <h5 id="service-sales" class="font-weight-bold text-dark"><?php echo "$" . number_format($totalServiceSales, 2); ?></h5>
                    </div>
                </div>
				</a>
            </div>

            <div class="col-md-6 col-lg-6">
				<a href="admin-ProductSales.php" style="text-decoration: none;">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <div class="icon-container mb-2">
                            <i class="las la-clipboard-list icon-home bg-success text-light p-3 rounded-circle"></i>
                        </div>
                        <p class="font-weight-bold text-muted">Total Orders</p>
                        <h5 id="total-orders" class="font-weight-bold text-dark"><?php echo $totalFilteredRecords; ?></h5>
                    </div>
                </div>
				</a>
            </div>

            <div class="col-md-6 col-lg-6">
				<a href="admin-ProductSales.php" style="text-decoration: none;">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <div class="icon-container mb-2">
                            <i class="las la-chart-bar icon-home bg-info text-light p-3 rounded-circle"></i>
                        </div>
                        <p class="font-weight-bold text-muted">Total Product Sales</p>
                        <h5 id="product-sales" class="font-weight-bold text-dark"><?php echo "$" . number_format($totalOrderSales, 2); ?></h5>
                    </div>
                </div>
				</a>
            </div>

            <div class="col-md-6 col-lg-6">
				<a href="admin-Users.php" style="text-decoration: none;">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <div class="icon-container mb-2">
                            <i class="las la-id-card icon-home bg-warning text-light p-3 rounded-circle"></i>
                        </div>
                        <p class="font-weight-bold text-muted">Registered Customers</p>
                        <h5 id="registered-customers" class="font-weight-bold text-dark"><?php echo $totalRegisteredUsers; ?></h5>
                    </div>
                </div>
				</a>
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


