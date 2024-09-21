<?php
// Include database $db_connectionection
include("db_connect.php");

// Check if 'selectedservice' is passed as a URL parameter
if (isset($_GET['selectedEmail'])) {
    // Retrieve the service from the URL
    $selectedEmail = $_GET['selectedEmail'];

    // Sanitize the input to prevent SQL injection
    $selectedEmail = mysqli_real_escape_string($db_connection, $selectedEmail);

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM tbl_user WHERE email = '$selectedEmail'";

    // Execute the query
    if (mysqli_query($db_connection, $sql)) {
        echo "<script>
        alert('User $selectedEmail has been successfully deleted');
        window.location.href='admin-Users.php';
    </script>";
    } 
} 

// Close the database $db_connectionection
mysqli_close($db_connection);
?>
