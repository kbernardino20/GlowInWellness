<?php
include("db_connect.php"); // Ensure this file contains your database connection

if (isset($_POST['submit'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Error variables
    $current_password_error = '';
    $confirm_password_error = '';
    $password_error = '';
    $errors = 0;

    // Get the email from the session
    $email = $_SESSION['email'];

    // Fetch the current password from the database using the email
    $query = "SELECT password FROM tbl_user WHERE email = ?";
    $stmt = $db_connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($stored_password);
    $stmt->fetch();
    $stmt->close();

    // Verify current password
    if ($current_password !== $stored_password) {
        $current_password_error = "*Current password is incorrect.*";
        $errors++;
    }

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        $confirm_password_error = "*New password and confirm password do not match.*";
        $errors++;
    } else {
        $confirm_password = mysqli_real_escape_string($db_connection, $_POST['confirm_password']);
        if(input_check($confirm_password, 'password')){
            $password_error = "*Password must be at least 8 characters long, contain one lowercase and uppercase letter, one number and one special character!*";
            $errors++;
        }else{
            unset($password_error);
        }
    }

    // If no errors, update the password in the database
    if($errors == 0){
        $update_query = "UPDATE tbl_user SET password = ? WHERE email = ?";
        $update_stmt = $db_connection->prepare($update_query);
        $update_stmt->bind_param("ss", $new_password, $email);

        if ($update_stmt->execute()) {
            $alertMessage = "Password updated successfully.";
            $encodedMessage = urlencode($alertMessage);
            header("Location: user-homepage.php?alert=$encodedMessage");
        } 
        $update_stmt->close();
    }
}
?>