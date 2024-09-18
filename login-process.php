<?php

include("db_connect.php");

    if (isset($_POST['submit'])){
            //get database connection
            
            $enumber_error = $password_error = "";
            $errors = 0;

            //USERNAME
            if(empty($_POST['enumber'])){
                $enumber_error = "Please enter the username!";
                $errors++;
            }else{
                //input validation for username
                $enumber = mysqli_real_escape_string($db_connection, $_POST['enumber']);

                //Create query to check existing account in the database
                $ENquery = "SELECT * FROM tbl_user WHERE username = '$enumber'";
                $ENresult = $db_connection->query($ENquery);

                if(input_check($enumber, 'normal')){
                    $enumber_error = "Invalid Username";
                    $errors++;
                }elseif ($ENresult){
                    if (mysqli_num_rows($ENresult) == 0) {
                        $enumber_error = "Account not found! Please register!";
                        $errors++;
                        
                    }else{
                        //no error: employee number input found in the DB    
                        unset($enumber_error);                
                    }
                }
            }
            //PASSWORD
            if(empty($_POST['password'])){
                $password_error = "Please enter the password!";
                $errors++;
            }else{


                $password = mysqli_real_escape_string($db_connection, $_POST['password']);

                //Create query to check existing account in the database
                $PASSquery = "SELECT * FROM tbl_user WHERE username='$enumber' AND password='$password'";
                $PASSresult = $db_connection->query($PASSquery);

                if ($PASSresult){
                    if (mysqli_num_rows($PASSresult) == 0) {
                        $password_error = "Incorrect password!";
                        $errors++;
                        
                    }else{
                        //no error: employee number input found in the DB    
                        unset($password_error);                
                    }
                }
            }
    
 
            //RUN QUERY - check if the enum and pass are in the DB
            if($errors == 0){
                //select query including roles
                session_start();
                $guestID = session_id();

                // Delete query for guest orders
                $delete_query = "DELETE FROM tbl_guestorders WHERE email = '$guestID'";
                $db_connection->query($delete_query);
                
                // Select query to check the user details
                $UserVal = "SELECT * FROM tbl_user WHERE username='$enumber'";
                $UserResult = mysqli_query($db_connection, $UserVal);


                    //REDIRECT TO ACCOUNT HOMEPAGE
                    $user = mysqli_fetch_array($UserResult);
                    
                    $_SESSION['enumber'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['mobile_num'] = $user['mobile_num'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
                    $_SESSION['user_img'] = $user['user_img'];


                    if ($_SESSION['role'] == 'admin') {
                        header("Location: admin-Dashboard.php");
                    }else{
                        header("Location: user-homepage.php");
                    }
                    exit;

            
            }

        }
       
?>