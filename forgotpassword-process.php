<?php

include("db_connect.php");

    if (isset($_POST['submit'])){
            //get database connection
            

            function generateUniqueID() {
                $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                $numbers = '0123456789';
                $specialCharacters = '!@#$%^&*()_+{}[]<>?,./';
            
                $id = '';
            
                // Add 7 random letters (both lowercase and uppercase)
                for ($i = 0; $i < 7; $i++) {
                    $id .= $letters[rand(0, strlen($letters) - 1)];
                }
            
                // Add 3 random numbers
                for ($i = 0; $i < 3; $i++) {
                    $id .= $numbers[rand(0, strlen($numbers) - 1)];
                }
            
                // Add 2 random special characters
                for ($i = 0; $i < 2; $i++) {
                    $id .= $specialCharacters[rand(0, strlen($specialCharacters) - 1)];
                }
            
                // Shuffle the generated ID to randomize the position of characters
                $id = str_shuffle($id);
            
                return $id;
            }

            $uniqueID = generateUniqueID();
            $fpass_error = "";
            $errors = 0;

            //USERNAME
            if(empty($_POST['email_Fpass'])){
                $fpass_error = "Please enter the username!";
                $errors++;
            }else{
                //input validation for username
                $email_Fpass = mysqli_real_escape_string($db_connection, $_POST['email_Fpass']);

                //Create query to check existing account in the database
                $FPquery = "SELECT * FROM tbl_user WHERE email = '$email_Fpass'";
                $FPresult = $db_connection->query($FPquery);

                if(input_check($enumber, 'email')){
                    $fpass_error = "*Invalid Username*";
                    $errors++;
                }elseif ($FPresult){
                    if (mysqli_num_rows($FPresult) == 0) {
                        $fpass_error = "*Account not found!*";
                        $errors++;
                        
                    }else{
                        //no error: employee number input found in the DB    
                        unset($fpass_error);                
                    }
                }
            }

 
            //RUN QUERY - check if the enum and pass are in the DB
            if($errors == 0){
                

                // $hashed_password = password_hash($uniqueID, PASSWORD_DEFAULT);

                // Prepare the SQL statement to update the password
                $sql = "UPDATE tbl_user SET password = ? WHERE email = ?";

                // Prepare and execute the SQL statement
                if ($stmt = $db_connection->prepare($sql)) {
                    // Bind parameters
                    $stmt->bind_param("ss", $uniqueID, $email_Fpass);

                    // Execute the statement
                    if ($stmt->execute()) {


                        //Add the code to email the temporary password $uniqueID


                        echo "<script>
                            alert('Your request has been submitted! Please check your email for the new password.');
                            window.location.href='index.php';
                        </script>";
                    }
                    $stmt->close();
                }

            }
    }
    $db_connection->close();   
?>