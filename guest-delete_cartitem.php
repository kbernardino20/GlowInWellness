<?php
include("db_connect.php");

if (isset($_GET['product_name'])) {
    // Decode the product name in case it contains special characters
    $product_name = urldecode($_GET['product_name']);

    // Ensure the user is logged in
    session_start();
    $email = session_id();

    // SQL query to delete the specific item by product name
    $query = "DELETE FROM tbl_guestorders WHERE product_name = '$product_name' AND email = '$email'";

    if ($db_connection->query($query) === TRUE) {
        // Redirect back to the cart page or another relevant page after deletion
        header("Location: guest-Cart.php");
        exit();
    } 
}
?>