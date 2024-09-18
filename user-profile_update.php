<?php
    if(isset($_POST['submit'])){
        //set database connection
        include("db_connect.php");

        //error validation variables
        $fn_error = $ln_error = $dept_error = $password_error = "";
        $errors = 0;

        //INPUT VALIDATION - check each input in registration form

        $email = mysqli_real_escape_string($db_connection, $_POST['email_hidden']);


        //FIRST NAME
        if(empty($_POST['firstname'])){
            $fn_error = "First name cannot be blank!";
            $errors++;
        }else{
            $first_name = mysqli_real_escape_string($db_connection, $_POST['firstname']);
            if(input_check($first_name, 'text')){
                $fn_error = "Only letters and white space allowed!";
                $errors++;
            }else{
                unset($fn_error);
            }
        }

        //LAST NAME
        if(empty($_POST['lastname'])){
            $ln_error = "Last name cannot be blank!";
            $errors++;
        }else{
            $last_name = mysqli_real_escape_string($db_connection, $_POST['lastname']);
            if(input_check($last_name, 'text')){
                $ln_error = "Only letters and white space allowed!";
                $errors++;
            }else{
                unset($ln_error);
            }
        }


        //DEPARTMENT
        if(empty($_POST['dept'])){
            $dept_error = "Mobile number cannot be blank!";
            $errors++;
        }else{
            $depart = mysqli_real_escape_string($db_connection, $_POST['dept']);
            if(input_check($depart, 'empno')){
                $dept_error = "Only numbers are allowed!";
                $errors++;
            }else{
                unset($dept_error);
            }
        }
        
        //USERNAME
        if(empty($_POST['enumber'])){
            $enumber_error = "Username cannot be blank!";
            $errors++;
        }else{
            $enumber = mysqli_real_escape_string($db_connection, $_POST['enumber']);
        }
        
  


        //IMAGES
        $fileName = $_FILES["image"]["name"];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetDir = "Photos\USER/";
        $newFileName = $email . "." . $ext; // Assuming $enumber is unique for each user
        $targetPath = $targetDir . $newFileName;

        if (in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $query = "UPDATE tbl_user SET 
                            first_name = '$first_name', 
                            last_name = '$last_name', 
                            mobile_num = '$depart', 
                            username = '$enumber', 
                            user_img = '$newFileName' 
                        WHERE email = '$email';";
                        
                if (mysqli_query($db_connection, $query)) {
                    // Proceed with session handling and redirection
                    $_SESSION = array();
                    session_destroy();
                    
                    $UserVal = "SELECT * FROM tbl_user WHERE email='$email'";
                    $UserResult = mysqli_query($db_connection, $UserVal);

                    if (mysqli_num_rows($UserResult) == 1) {
                        // Start a new session and set session variables
                        session_start();
                        $user = mysqli_fetch_array($UserResult);
                        $_SESSION['enumber'] = $user['username'];
                        $_SESSION['role'] = $user['role'];
                        $_SESSION['first_name'] = $user['first_name'];
                        $_SESSION['last_name'] = $user['last_name'];
                        $_SESSION['mobile_num'] = $user['mobile_num'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['password'] = $user['password'];
                        $_SESSION['user_img'] = $user['user_img'];
                        $alertMessage = "Account details successfully updated!";
                        $encodedMessage = urlencode($alertMessage);

                        // Redirect to user homepage with the alert message
                        header("Location: user-homepage.php?alert=$encodedMessage");
                    }
                } 
            }
        } else {
            $image_error = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($errors == 0){

                $update_user = "UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name', mobile_num = '$depart' WHERE email = '$email';";
                mysqli_query($db_connection, $update_user);

                $UserVal = "SELECT * FROM tbl_user WHERE email = '$email'";
                $UserResult = mysqli_query($db_connection, $UserVal);

                // Unset all session variables
                $_SESSION = array();

                // Destroy the session
                session_destroy();
                
                if(mysqli_num_rows($UserResult) == 1){
                    //REDIRECT TO USER HOMEPAGE
                    $user = mysqli_fetch_array($UserResult);
                    session_start();
                    $_SESSION['enumber'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['mobile_num'] = $user['mobile_num'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
                    $_SESSION['user_img'] = $user['user_img'];
                    $alertMessage = "Account details successfully updated!";
                    $encodedMessage = urlencode($alertMessage);

                    // Redirect to log in page with the alert message
                    header("Location: user-homepage.php?alert=$encodedMessage");
                    
                }
            
            }
        }
    
    }

?>