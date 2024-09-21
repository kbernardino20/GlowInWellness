<?php
// Include database $db_connectionection
include("db_connect.php");

// Check if 'selectedservice' is passed as a URL parameter
if (isset($_GET['Ref_No'])) {
    // Retrieve the service from the URL
    $Ref_No = $_GET['Ref_No'];

    // Sanitize the input to prevent SQL injection
    $Ref_No = mysqli_real_escape_string($db_connection, $Ref_No);

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM tbl_messages WHERE msg_id = '$Ref_No'";

    // Execute the query
    if (mysqli_query($db_connection, $sql)) {
        echo "<script>
        alert('Message has been successfully deleted');
        window.location.href='admin-Messages.php';
    </script>";
    } 
} 

// Close the database $db_connectionection
mysqli_close($db_connection);
?>
