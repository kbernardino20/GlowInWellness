<?php 
    session_start();
    include("admin_session.php");

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

        button:hover {
    background-color: #5a005a;
    color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
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
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h4><b>New User </b><br>registered in the last 30days</h4>
                                    </div>

                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <?php
                                    include("db_connect.php");
                                    
                                    date_default_timezone_set('Australia/Sydney');
                                    $start_date = date('d/m/Y', strtotime('-30 days'));
                                    $end_date = date('d/m/Y');

                                    // Corrected query to compare dates accurately
                                    $query = "SELECT * FROM tbl_user 
                                            WHERE STR_TO_DATE(date_registered, '%d/%m/%Y') 
                                            BETWEEN STR_TO_DATE('$start_date', '%d/%m/%Y') 
                                            AND STR_TO_DATE('$end_date', '%d/%m/%Y')";

                                    $result = $db_connection->query($query);

                                    if ($result && $result->num_rows > 0) {
                                        echo '<thead>
                                                <tr>
                                                    <th></th>
                                                    <th style="color: #7E007F;">Name</th>
                                                    <th style="color: #7E007F;">Email</th>
                                                    <th style="color: #7E007F;">Mobile No.</th>
                                                    <th style="color: #7E007F;">Username</th>
                                                    <th style="color: #7E007F;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td></td>
                                                    <td>".$row['first_name']." ".$row['last_name']."</td>
                                                    <td>".$row['email']."</td>
                                                    <td>".$row['mobile_num']."</td>                        
                                                    <td>".$row['username']."</td>
                                                    <td>
                                                        <a href='admin-view_users.php?selectedEmail=".urlencode($row['email'])."' class='settings' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE8F4;</i></a>
                                                        <a href=\"javascript:void(0);\" onclick=\"if(confirm('Are you sure you want to delete this user?')) { window.location.href='admin-delete_user.php?selectedEmail=".urlencode($row['email'])."'; }\" class='delete' title='Delete user' data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a>
                                                    </td>
                                                </tr>";
                                        }
                                        echo '</tbody>';
                                    } else {
                                        echo "<tbody><tr><td colspan='7' style='text-align:center;'><b>No new registered user in the last 30 days</b></td></tr></tbody>";
                                    }
                                ?>
                            </table>

                        </div>
                    </div>
                </div> 


                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 style="color: white;"><b>List of all users</b></h4>
                                        
                                        <!-- Start form -->
                                        <form action="" method="GET" class="form-inline d-flex">
                                        <label style="font-size: 18px; color: white; margin-right: 10px; padding-top: 5px;" for="search-by">Search by:</label>
                                            <!-- Combo Box for Search Criteria -->
                                            <select name="search-by" id="search-by" class="form-control" style="font-size: 12px; border-radius: 20px; padding: 6px 20px; width: 150px; margin-right: 10px;">
                                                <option value="name">Name</option>
                                                <option value="email">Email</option>
                                                <option value="mobile">Mobile No</option>
                                                <option value="username">Username</option>
                                            </select>

                                            <!-- Search Input -->
                                            <input type="text" id="namesearch" name="search-term" class="form-control" style="font-size: 12px; width: 150px; margin-right: 10px;">
                                            <!-- Button Container -->
                                            <div class="btn-group" role="group" style="display: flex;">
                                                <!-- Search Button -->
                                                <button type="submit" class='btn btn-outline-primary rounded' 
                                                    style='font-size: 12px; background-color: #7E007F; border-radius: 20px; padding: 6px 20px; color: white; border: 2px solid white; width: 120px;'>
                                                    Search
                                                </button>

                                                <!-- Clear Search Button -->
                                                <button type="button" onclick="clearSearch()" class="btn btn-outline-primary rounded" 
                                                    style="font-size: 12px; background-color: #7E007F; border-radius: 20px; padding: 6px 20px; color: white; border: 2px solid white; width: 120px; margin-left: 10px;">
                                                    Clear Search
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>


                            </div>
                            <table class="table table-striped table-hover">
                            <?php
                                include("db_connect.php");

                                date_default_timezone_set('Australia/Sydney');

                                // Get search criteria from the form
                                $searchBy = isset($_GET['search-by']) ? $_GET['search-by'] : '';
                                $searchTerm = isset($_GET['search-term']) ? trim($_GET['search-term']) : '';

                                // Pagination setup
                                $records_per_page = 10; // Number of records to show per page
                                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                                $offset = ($page - 1) * $records_per_page;

                                // Base query for counting records
                                $baseQuery = "SELECT COUNT(*) AS total FROM tbl_user WHERE STR_TO_DATE(date_registered, '%d/%m/%Y') < DATE_SUB(CURDATE(), INTERVAL 30 DAY)";

                                // Add search conditions based on selected criteria
                                $searchQuery = "";

                                if ($searchBy && $searchTerm) {
                                    $searchTerm = "%$searchTerm%";  // Adding wildcards for partial matching (contains search)
                                    if ($searchBy === 'name') {
                                        $searchQuery = " AND (first_name LIKE '$searchTerm' OR last_name LIKE '$searchTerm')";
                                    } elseif ($searchBy === 'email') {
                                        $searchQuery = " AND email LIKE '$searchTerm'";
                                    } elseif ($searchBy === 'mobile') {
                                        $searchQuery = " AND mobile_num LIKE '$searchTerm'";
                                    } elseif ($searchBy === 'username') {
                                        $searchQuery = " AND username LIKE '$searchTerm'";
                                    } elseif ($searchBy === 'date') {
                                        // Assuming the search term is a date formatted as dd/mm/yyyy
                                        $searchQuery = " AND date_registered LIKE '$searchTerm'";
                                    }
                                }

                                // Final query for counting total records after applying search conditions
                                $total_query = $baseQuery . $searchQuery;
                                $total_result = $db_connection->query($total_query);
                                $total_row = $total_result->fetch_assoc();
                                $total_records = $total_row['total'];
                                $total_pages = ceil($total_records / $records_per_page);

                                // Fetch records for the current page with search filters
                                $query = "SELECT * FROM tbl_user WHERE STR_TO_DATE(date_registered, '%d/%m/%Y') < DATE_SUB(CURDATE(), INTERVAL 30 DAY) $searchQuery LIMIT $offset, $records_per_page;";
                                $result = $db_connection->query($query);

                                if ($result && $result->num_rows > 0) {
                                    echo '<thead>
                                            <tr>
                                                <th></th>
                                                <th style="color: #7E007F;">Name</th>
                                                <th style="color: #7E007F;">Email</th>
                                                <th style="color: #7E007F;">Mobile No.</th>
                                                <th style="color: #7E007F;">Username</th>
                                                <th style="color: #7E007F;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td style='font-weight: normal;'></td>
                                                <td style='font-weight: normal;'>".$row['first_name']." ".$row['last_name']."</td>
                                                <td style='font-weight: normal;'>".$row['email']."</td>
                                                <td style='font-weight: normal;'>".$row['mobile_num']."</td>
                                                <td style='font-weight: normal;'>".$row['username']."</td>
                                                <td style='font-weight: normal;'>
                                                    <a href='admin-view_users.php?selectedEmail=" . urlencode($row['email']) . "' class='settings' title='View' data-toggle='tooltip' id='view-user'>
                                                        <i class='material-icons'>&#xE8F4;</i>
                                                    </a>
                                                    <a href=\"javascript:void(0);\" onclick=\"if(confirm('Are you sure you want to delete this user?')) { window.location.href='admin-delete_user.php?selectedEmail=".urlencode($row['email'])."'; }\" class='delete' title='Delete user' data-toggle='tooltip'>
                                                        <i class='material-icons'>&#xE5C9;</i>
                                                    </a>
                                                </td>
                                            </tr>";
                                    }
                                    echo '</tbody>';
                                } else {
                                    echo "<tbody><tr><td colspan='6' style='text-align:center; font-weight: normal;'>No records found</td></tr></tbody>";
                                }
                            ?>


                            </table>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    Showing <?php echo ($offset + 1); ?> to <?php echo min($offset + $records_per_page, $total_records); ?> of <?php echo $total_records; ?> records
                                </div>
                                <nav>
                                    <ul class="pagination">
                                        <?php if ($page > 1): ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php endfor; ?>

                                        <?php if ($page < $total_pages): ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
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



// Clear Search Fields Function
function clearSearch() {
        document.getElementById("search-by").selectedIndex = 0; // Reset search criteria dropdown
        document.getElementById("namesearch").value = ''; // Clear search input field
        window.location.href = window.location.pathname; // Reload the page to clear search
    }
</script>
