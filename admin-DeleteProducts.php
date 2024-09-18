<?php
// Include database $db_connectionection
include("db_connect.php");

// Check if 'selectedservice' is passed as a URL parameter
if (isset($_GET['selectedproducts'])) {
    // Retrieve the service from the URL
    $selectedproducts = $_GET['selectedproducts'];

    // Sanitize the input to prevent SQL injection
    $selectedproducts = mysqli_real_escape_string($db_connection, $selectedproducts);

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM tbl_products WHERE product_name = '$selectedproducts'";

    // Execute the query
    if (mysqli_query($db_connection, $sql)) {
        echo "<script>
        alert('Product $selectedproducts has been successfully deleted');
        window.location.href='admin-products.php';
    </script>";
    } 
} 

// Close the database $db_connectionection
mysqli_close($db_connection);
?>
