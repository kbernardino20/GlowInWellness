<?php
// Include database $db_connectionection
include("db_connect.php");

// Check if 'selectedservice' is passed as a URL parameter
if (isset($_GET['title'])) {
    // Retrieve the service from the URL
    $Article = $_GET['title'];

    // Sanitize the input to prevent SQL injection
    $Article = mysqli_real_escape_string($db_connection, $Article);

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM tbl_blog WHERE title = '$Article'";

    // Execute the query
    if (mysqli_query($db_connection, $sql)) {
        echo "<script>
        alert('Blog has been successfully deleted');
        window.location.href='admin-Blog_List.php';
    </script>";
    } 
} 

// Close the database $db_connectionection
mysqli_close($db_connection);
?>
