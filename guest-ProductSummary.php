<?php

include("db_connect.php");


// Retrieve form data
$firstName = isset($_GET['fname']) ? urldecode($_GET['fname']) : '';
$lastName = isset($_GET['lname']) ? urldecode($_GET['lname']) : '';
$mobileNumber = isset($_GET['mobile']) ? urldecode($_GET['mobile']) : '';
$email = isset($_GET['email']) ? urldecode($_GET['email']) : '';

session_start();
$guest = session_id();


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Glow in Wellness</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Allura&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <!-- Bootstrap + LeadMark main styles -->
	  <link rel="stylesheet" href="assets/css/leadmark.css">
    

    <style>
        .receipt-container {
        width: 100%; /* Full width for mobile */
        max-width: 450px; /* Limit width for larger screens */
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        box-sizing: border-box;
        color: #000000;
        margin: 0 auto; /* Center container */
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

    .table td {
        word-wrap: break-word; /* Ensure long item names break properly */
        white-space: normal; /* Prevent text from overflowing */
    }

    .table td, .table th {
        padding: 5px; /* Reduce padding for better fit */
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

    /* Media queries for smaller screens */
    @media (max-width: 576px) {
        .receipt-container {
            padding: 15px; /* Reduce padding for smaller screens */
        }

        .receipt-container h2, 
        .receipt-container p, 
        .table td, 
        .table th, 
        .total-price {
            font-size: 14px; /* Adjust font size for mobile */
        }
    }

        
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/imgs/logo.svg" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="contact">
                        <a class="nav-link" href="index.php">Back to home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Second Navigation -->


    <!-- Login Section -->
    <section id="login" class="section has-img-bg pb-0" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
    <div class="container">
    <div class="content transition text-center">
		<div class="container-fluid dashboard">
        <label style="color: #ffffff;">
            <a href="#" style="color: #ffffff; text-decoration: none; font-size: 30px;">Order <b> Summary </b></a>
        </label>
            <br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-8">
                    <div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-12">
                <div class="receipt-container">
                    <h2 class="text-center">Name: <span><?php echo $firstName . " " . $lastName ?></span></h2>
                    <p class="text-center">Email: <span><?php echo $email ?></span></p>
                    <p class="text-center">Mobile: <span><?php echo $mobileNumber ?></span></p>
                    <hr><br>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <?php
                                include("db_connect.php");

                                // Query to get all individual orders for the user
                                $query2 = "SELECT * FROM tbl_guestorders WHERE email = '$guest'";
                                $result2 = $db_connection->query($query2);

                                // Query to get the sum of total sales for the user
                                $queryTotalSales = "SELECT SUM(total) as total_sales FROM tbl_guestorders WHERE email = '$guest'";
                                $resultTotalSales = $db_connection->query($queryTotalSales);

                                // Fetch the total sales value
                                if ($resultTotalSales && $resultTotalSales->num_rows > 0) {
                                    $rowTotalSales = $resultTotalSales->fetch_assoc();
                                    // Format total sales to 2 decimal points
                                    $total_sales = number_format($rowTotalSales['total_sales'], 2);
                                }

                                if ($result2 && $result2->num_rows > 0) {
                                    echo '<thead>
                                            <tr>
                                                <th style="color: #7E007F;">Item</th>
                                                <th style="color: #7E007F;">Price</th>
                                                <th style="color: #7E007F;">Quantity</th>
                                                <th style="color: #7E007F;">Total</th>
                                            </tr>
                                          </thead>
                                          <tbody>';

                                    // Fetch all rows to display individual orders
                                    while ($row = $result2->fetch_assoc()) {
                                        echo "<tr>
                                                <td>".$row['product_name']."</td>
                                                <td>A$".number_format($row['price'], 2)."</td>
                                                <td>".$row['quantity']."</td>                        
                                                <td>A$".number_format($row['total'], 2)."</td>
                                              </tr>";
                                    }
                                    echo '</tbody>';
                                } else {
                                    echo "<tbody><tr><td colspan='4' style='text-align:center;'><b>You do not have any items in your cart</b></td></tr></tbody>";
                                }
                            ?>
                        </table>
                    </div>

                    <br><hr>
                    <div class="total-price d-flex justify-content-between">
                        <span>Total price</span>
                        <span>A$<?php echo $total_sales ?></span>
                    </div>
                </div><br>

                <div class="well">
                    <div class="d-flex justify-content-center">
                        <form action="<?php echo 'guest-OrderConfirmation_process.php?fname=' . urlencode($firstName) . 
                                      '&lname=' . urlencode($lastName) . 
                                      '&mobile=' . urlencode($mobileNumber) . 
                                      '&email=' . urlencode($email); ?>" method="POST">
    
                            <!-- Hidden field to pass total order -->
                            <input type="hidden" name="total_order" value="<?php echo $total_sales; ?>">
                            
                            <!-- Checkout button -->
                            <button type="submit" class="btn btn-primary btn-lg rounded w-100 mt-3"
                                <?php echo ($total_sales == 0.00) ? 'disabled' : ''; ?>>
                                Check out
                            </button>
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
	</div>
        <!-- Copyright paragraph placed here outside the row but inside the container -->
         <br><br>
         <div style="flex-grow: 1; height: 1px; background-color: #ccc;"></div>
        <p class="mb-0 small text-center" style="padding-top: 20px;">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved</p>
        <br><br>
    </div>
</section>


	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>


</body>
</html>
