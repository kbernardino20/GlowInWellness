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
<?php include("user-topbar.php");?>

		<!--Sidebar-->
        <?php include("user-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">
            
		
			
                <!-- <h6 class="mb-0 text-center" style="font-size: 50px; font-family: 'Sacramento', cursive; color: #7E007F;">My Orders</h6> -->
				<div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h2><i class="fas fa-cart-plus fa-lg"></i>    My <b>Cart</b></h2>
                                    </div>
                                    <div class="col-sm-7">
                                        <a href="user-ProductOrder_Information.php" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i> <span>Proceed to checkout</span></a>
                                        <a href="user-products.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Items</span></a>		
                                        
				
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <?php
                                    include("db_connect.php");
                                    $email = $_SESSION['email'];
                                    $query = "SELECT * FROM tbl_orders INNER JOIN tbl_products ON tbl_orders.product_name = tbl_products.product_name WHERE tbl_orders.email = '$email'";
                                    $result = $db_connection->query($query);
                                    $outOfStock = false;

                                    if ($result) {
                                        $count = mysqli_num_rows($result);

                                        if ($count > 0) {
                                            echo "<thead>
                                                    <tr>
                                                        <th></th>
                                                        <th style='color: #7E007F;'>Product</th>
                                                        <th style='color: #7E007F;'>Price</th>
                                                        <th style='color: #7E007F;'>Quantity</th>
                                                        <th style='color: #7E007F;'>Total Price</th>
                                                        <th style='color: #7E007F;'>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['stock'] <= 0) {
                                                    // Remove the item from the cart due to out-of-stock
                                                    $deleteQuery = "DELETE FROM tbl_orders WHERE product_name = '".$row['product_name']."' AND email = '$email'";
                                                    $db_connection->query($deleteQuery);
                                                    $outOfStock = true;
                                                    continue; // Skip the out-of-stock item
                                                }

                                                echo "<tr>
                                                        <td><img src='Photos/Products/".$row['item_img']."' alt='' style='width: 0.5in; height: 0.60in;'></td>
                                                        <td>".$row['product_name']."</td>
                                                        <td>A$".$row['price']."</td>
                                                        <td>
                                                            <form action='user-update_quantity.php' method='post' style='display: flex; align-items: center;'>
                                                                <input type='hidden' name='product_name' value='".$row['product_name']."'>
                                                                <button type='submit' name='decrease' class='btn btn-sm btn-outline-secondary'>-</button>
                                                                <input type='text' name='quantity' value='".$row['quantity']."' style='width: 40px; text-align: center; border: none;' readonly>
                                                                <button type='submit' name='increase' class='btn btn-sm btn-outline-secondary'>+</button>
                                                            </form>
                                                        </td>
                                                        <td>A$".$row['total']."</td>
                                                        <td>
                                                            <a href='user-delete_cartitem.php?product_name=".urlencode($row['product_name'])."' class='delete' title='Remove to cart' data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a>
                                                        </td>
                                                    </tr>";
                                            }

                                            echo "</tbody>";
                                        } else {
                                            echo "<tr><td colspan='6' class='text-center' style='color: #7E007F; font-size: 20px; padding: 50px;'>Your cart is empty</td></tr>";
                                        }

                                        // If any items were removed due to being out of stock
                                        if ($outOfStock) {
                                            echo "<script>
                                                    alert('One or more items were removed from your cart because they are out of stock.');
                                                    window.location.href = 'user-MyOrders.php'; // Refreshes admin-topbar.php
                                                </script>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center' style='color: #7E007F; font-size: 20px; padding: 50px;'>Your cart is empty</td></tr>";
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
</script>
