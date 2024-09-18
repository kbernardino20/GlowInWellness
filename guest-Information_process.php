<?php
    if(isset($_POST['submit'])){


        //error validation variables
        $fn_error = $ln_error = $dept_error = $email_error = "";
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
            

        //EMAIL
        if(empty($_POST['email'])){
            $email_error = "Email cannot be blank!";
            $errors++;
        }else{
            $email = mysqli_real_escape_string($db_connection, $_POST['email']);

            //input validation for email
            if(input_check($email, 'email')){
                $email_error = "Invalid email format!";
                $errors++;
            //check existing account in the database
            }else {
                unset($dept_error);
            }
        }
        
        //New user added in database: it_ims_db, table: users
        if($errors == 0){
            // Redirect to log in page with the alert message
            header("Location: guest-Summary.php?selectedservice=" . urlencode($selectedservice) . 
                    "&selecteddate=" . urlencode($selectedDate) . 
                    "&selectedday=" . urlencode($selectedDay) . 
                    "&selectedtime=" . urlencode($selectedtime) . 
                    "&fname=" . urlencode($first_name) . 
                    "&lname=" . urlencode($last_name) . 
                    "&mobile=" . urlencode($depart) . 
                    "&email=" . urlencode($email));
           
        }
    }

?>