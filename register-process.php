<?php
    if(isset($_POST['submit'])){
        //set database connection
        include("db_connect.php");

        //error validation variables
        $fn_error = $ln_error = $dept_error = $enumber_error = $password_error = $email_error = "";
        $errors = 0;

        //INPUT VALIDATION - check each input in registration form

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
        

        //EMPLOYEE NUMBER
        if(empty($_POST['enumber'])){
            $enumber_error = "Username cannot be blank!";
            $errors++;
        }else{
            $enumber = mysqli_real_escape_string($db_connection, $_POST['enumber']);

            //Create query to check existing account in the database
            $ENquery = "SELECT * FROM tbl_user WHERE username = '$enumber'";
            $ENresult = $db_connection->query($ENquery);


                if (mysqli_num_rows($ENresult) > 0) {
                    $enumber_error = "This username is already exist!";
                    $errors++;

                }else{
                //no error for employee number input    
                unset($enumber_error);
            }

        

        //PASSWORD
        if(empty($_POST['password'])){
            $password_error = "Password cannot be blank!";
            $errors++;
        }else{
            $password = mysqli_real_escape_string($db_connection, $_POST['password']);
            if(input_check($password, 'password')){
                $password_error = "A minimum 8-character password must include one lowercase and uppercase letter, one number, and one special character!";
                $errors++;
            }else{
                unset($password_error);
            }
        }        

        //EMAIL
        if(empty($_POST['email'])){
            $email_error = "Email cannot be blank!";
            $errors++;
        }else{
            $email = mysqli_real_escape_string($db_connection, $_POST['email']);

            //Create query to check existing email in the database
            $Emailquery = "SELECT * FROM tbl_user WHERE email = '$email'";
            $Emailresult = $db_connection->query($Emailquery);

            //input validation for email
            if(input_check($email, 'email')){
                $email_error = "Invalid email format!";
                $errors++;
            //check existing account in the database
            }elseif ($Emailresult){
                if (mysqli_num_rows($Emailresult) > 0) {
                     $email_error = "This email is already exist!";
                     $errors++;
        
                }else{
                     //no error for email input   
                     unset($email_error);
                }
            }
        }
        
        //New user added in database: it_ims_db, table: users
        if($errors == 0){

            $date_registered = date('d/m/Y');
            $register_user = "INSERT INTO tbl_user (first_name, last_name, email, mobile_num, role, username, password, user_img, date_registered) VALUES ('$first_name', '$last_name', '$email', '$depart', 'user', '$enumber', '$password', 'USER.jpg', '$date_registered')";

            mysqli_query($db_connection, $register_user);

            $alertMessage = "You have successfully created account; please continue to log in!";
            $encodedMessage = urlencode($alertMessage);

            // Redirect to log in page with the alert message
            header("Location: login.php?alert=$encodedMessage");
           
        }
    }
}
?>