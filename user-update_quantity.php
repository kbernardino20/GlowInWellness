<?php
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    session_start();
    $email = $_SESSION['email'];
    
    // Fetch the current price and quantity for the product in the user's cart
    $query = "SELECT price, quantity FROM tbl_orders WHERE product_name = '$product_name' AND email = '$email'";
    $result = $db_connection->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
        $current_quantity = $row['quantity'];

        // Fetch available stock for the product from the products table
        $stock_query = "SELECT stock FROM tbl_products WHERE product_name = '$product_name'";
        $stock_result = $db_connection->query($stock_query);
        
        if ($stock_result->num_rows > 0) {
            $stock_row = $stock_result->fetch_assoc();
            $available_stock = $stock_row['stock'];

            if (isset($_POST['decrease'])) {
                if ($current_quantity > 1) {
                    // Decrease quantity and update total
                    $new_quantity = $current_quantity - 1;
                    $total = number_format($new_quantity * $price, 2, '.', '');
                    $query = "UPDATE tbl_orders SET quantity = $new_quantity, total = '$total' WHERE product_name = '$product_name' AND email = '$email'";
                } else {
                    // Quantity would become 0, so remove the product
                    $query = "DELETE FROM tbl_orders WHERE product_name = '$product_name' AND email = '$email'";
                    header("Location: user-MyOrders.php"); // Redirect back to cart page
                    exit();
                }
            } elseif (isset($_POST['increase'])) {
                // Check if the current quantity is less than available stock
                if ($current_quantity < $available_stock) {
                    // Increase quantity and update total
                    $new_quantity = $current_quantity + 1;
                    $total = number_format($new_quantity * $price, 2, '.', '');
                    $query = "UPDATE tbl_orders SET quantity = $new_quantity, total = '$total' WHERE product_name = '$product_name' AND email = '$email'";
                } else {
                    // Show an alert that the user has reached the maximum available stock
                    echo "<script>alert('You have reached the maximum available stock of this item');</script>";
                    header("Location: user-MyOrders.php"); // Redirect back to cart page
                    exit();
                }
            }

            if ($db_connection->query($query)) {
                header("Location: user-MyOrders.php"); // Redirect back to cart page
                exit();
            } 
        }
    } 
}
?>
