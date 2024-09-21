<?php

include("db_connect.php");


// Retrieve selected date, day, time and service
session_start();
$email = session_id();

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap + LeadMark main styles -->
	  <link rel="stylesheet" href="assets/css/leadmark.css">
    

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
            <a href="#" style="color: #ffffff; text-decoration: none;"> <h2>My <b>Cart</b></h2></a>
        </label>

            <br><br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="row justify-content-center">
    <div class="col-12 col-md-9">
        <div class="well">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <?php
                        include("db_connect.php");
                        
                        $query = "SELECT * FROM tbl_guestorders INNER JOIN tbl_products ON tbl_guestorders.product_name = tbl_products.product_name WHERE tbl_guestorders.email = '$email'";
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
                                        $deleteQuery = "DELETE FROM tbl_guestorders WHERE product_name = '".$row['product_name']."' AND email = '$email'";
                                        $db_connection->query($deleteQuery);
                                        $outOfStock = true;
                                        continue; // Skip the out-of-stock item
                                    }

                                    echo "<tr>
                                            <td><img src='Photos/Products/".$row['item_img']."' alt='' class='img-fluid' style='width: 0.5in; height: 0.60in;'></td>
                                            <td>".$row['product_name']."</td>
                                            <td>A$".$row['price']."</td>
                                            <td>
                                                <form action='guest-update_quantity.php' method='post' style='display: flex; align-items: center;'>
                                                    <input type='hidden' name='product_name' value='".$row['product_name']."'>
                                                    <button type='submit' name='decrease' class='btn btn-sm btn-outline-secondary'>-</button>
                                                    <input type='text' name='quantity' value='".$row['quantity']."' style='width: 40px; text-align: center; border: none;' readonly>
                                                    <button type='submit' name='increase' class='btn btn-sm btn-outline-secondary'>+</button>
                                                </form>
                                            </td>
                                            <td>A$".$row['total']."</td>
                                            <td>
                                                <a href='guest-delete_cartitem.php?product_name=".urlencode($row['product_name'])."' class='delete' title='Remove to cart' data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a>
                                            </td>
                                        </tr>";
                                }

                                echo "</tbody>";
                            } else {
                                echo "<tr><td colspan='6' class='text-center' style='color: #7E007F; font-size: 20px; padding: 50px;'>Your cart is empty</td></tr>";
                            }

                            if ($outOfStock) {
                                echo "<script>
                                        alert('One or more items were removed from your cart because they are out of stock.');
                                        window.location.href = 'guest-Cart.php';
                                    </script>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center' style='color: #7E007F; font-size: 20px; padding: 50px;'>Your cart is empty</td></tr>";
                        }
                    ?>
                </table>
            </div>

            <!-- Proceed to checkout button -->
            <a href="guest-Information_cart.php" class="btn btn-primary btn-lg rounded w-lg mt-3 <?php echo ($count == 0) ? 'disabled' : ''; ?>">
                Proceed to checkout
            </a>
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

    <script>
    document.querySelectorAll('.time-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.time-button').forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        document.getElementById('next-button').addEventListener('click', function(event) {
            const selectedTime = document.querySelector('.time-button.selected');
            if (!selectedTime) {
                alert('Please select a time before proceeding.');
                event.preventDefault();
            } else {
                const selectedTimeValue = selectedTime.getAttribute('data-time');
                const selectedService = "<?php echo urlencode($selectedservice); ?>";
                const selectedDate = "<?php echo urlencode($selectedDate); ?>";
                const selectedDay = "<?php echo urlencode($selectedDay); ?>";

                this.href = `guest-Information.php?selectedservice=${selectedService}&selecteddate=${selectedDate}&selectedday=${selectedDay}&selectedtime=${encodeURIComponent(selectedTimeValue)}`;
            }
        });
    </script>

</body>
</html>
