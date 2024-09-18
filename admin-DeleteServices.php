<?php
// Include database $db_connectionection
include("db_connect.php");

// Check if 'selectedservice' is passed as a URL parameter
if (isset($_GET['selectedservice'])) {
    // Retrieve the service from the URL
    $selectedservice = $_GET['selectedservice'];

    // Sanitize the input to prevent SQL injection
    $selectedservice = mysqli_real_escape_string($db_connection, $selectedservice);

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM tbl_services WHERE service = '$selectedservice'";

    // Execute the query
    if (mysqli_query($db_connection, $sql)) {
        echo "<script>
        alert('Service $selectedservice has been successfully deleted');
        window.location.href='admin-Services.php';
    </script>";
    } 
} 

// Close the database $db_connectionection
mysqli_close($db_connection);
?>
