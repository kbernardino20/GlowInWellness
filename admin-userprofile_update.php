<?php
if (isset($_POST['submit'])) {
    // Set database connection
    include("db_connect.php");

    // Error validation variables
    $fn_error = $ln_error = $dept_error = $password_error = $enumber_error = $image_error = "";
    $errors = 0;

    // INPUT VALIDATION - check each input in registration form
    $email = mysqli_real_escape_string($db_connection, $_POST['email_hidden']);

    // FIRST NAME
    if (empty($_POST['firstname'])) {
        $fn_error = "*First name cannot be blank!*";
        $errors++;
    } else {
        $first_name = mysqli_real_escape_string($db_connection, $_POST['firstname']);
        if (input_check($first_name, 'text')) {
            $fn_error = "*Only letters and white space allowed!*";
            $errors++;
        }
    }

    // LAST NAME
    if (empty($_POST['lastname'])) {
        $ln_error = "*Last name cannot be blank!*";
        $errors++;
    } else {
        $last_name = mysqli_real_escape_string($db_connection, $_POST['lastname']);
        if (input_check($last_name, 'text')) {
            $ln_error = "*Only letters and white space allowed!*";
            $errors++;
        }
    }

    // DEPARTMENT
    if (empty($_POST['dept'])) {
        $dept_error = "*Mobile number cannot be blank!*";
        $errors++;
    } else {
        $depart = mysqli_real_escape_string($db_connection, $_POST['dept']);
        if (input_check($depart, 'empno')) {
            $dept_error = "*Only numbers are allowed!*";
            $errors++;
        }
    }

    // USERNAME
    if (empty($_POST['enumber'])) {
        $enumber_error = "*Username cannot be blank!*";
        $errors++;
    } else {
        $enumber = mysqli_real_escape_string($db_connection, $_POST['enumber']);
    }

    // IMAGE UPLOAD
    if (!empty($_FILES["image"]["name"])) {
        $fileName = $_FILES["image"]["name"];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetDir = "Photos/USER/"; // Changed backslash to forward slash
        $newFileName = $email . "." . $ext; // Assuming $email is unique for each user
        $targetPath = $targetDir . $newFileName;

        if (in_array($ext, $allowedTypes)) {
            if (!move_uploaded_file($tempName, $targetPath)) {
                $image_error = "*Error uploading file. Please try again.*";
                $errors++;
            }
        } else {
            $image_error = "*Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.*";
            $errors++;
        }
    }

    // Update user details if there are no errors
    if ($errors == 0) {
        $query = "UPDATE tbl_user SET 
                    first_name = '$first_name', 
                    last_name = '$last_name', 
                    mobile_num = '$depart', 
                    username = '$enumber'";
        
        // Add image update only if image was uploaded
        if (empty($image_error) && !empty($newFileName)) {
            $query .= ", user_img = '$newFileName'";
        }
        
        $query .= " WHERE email = '$email';";

        if (mysqli_query($db_connection, $query)) {
            echo "<script>
                    alert('Account details updated successfully!');
                    window.location.href='admin-users.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error updating account details.');
                    window.location.href='admin-users.php';
                </script>";
        }
    }
}
?>
