<?php
if(isset($_POST['submit'])){
    //set database connection
    include("db_connect.php");

    //error validation variables
    $sv_error = $desc_error = $price_error = $image_error = $dur_error = "";
    $errors = 0;

    //INPUT VALIDATION - check each input in registration form

    $servicetitle_hidden = mysqli_real_escape_string($db_connection, $_POST['servicetitle_hidden']);
    $servicetherapy = mysqli_real_escape_string($db_connection, $_POST['therapy']);

    //servicetitle_hidden
    if (empty($_POST['servicetitle'])) {
        $sv_error = "*Service Title cannot be blank!*";
        $errors++;
    } else {
        $servicetitle = mysqli_real_escape_string($db_connection, $_POST['servicetitle']);
    
        // Check if servicetitle is equal to servicetitle_hidden
        if ($servicetitle === $servicetitle_hidden) {
            $servicetitle = $servicetitle_hidden;
            unset($sv_error);
        } else {
            // Create query to check existing service title in the database
            $Servquery = "SELECT * FROM tbl_services WHERE service = '$servicetitle'";
            $Servresult = $db_connection->query($Servquery);

            // Check if the service title already exists
            if ($Servresult && mysqli_num_rows($Servresult) > 0) {
                $sv_error = "*This service title already exists!*";
                $errors++;
            } else {
                // No error for service title input
                unset($sv_error);
            }
        }
    }
    

    //servicedesc
    if(empty($_POST['servicedesc'])){
        $desc_error = "*Service description cannot be blank!*";
        $errors++;
    }else{
        $serviceDesc = mysqli_real_escape_string($db_connection, $_POST['servicedesc']);
        unset($desc_error);
    }

    // Service price validation
    if (empty($_POST['serviceprice'])) {
        $price_error = "*Price cannot be blank!*";
        $errors++;
    } else {

        $serviceprice = mysqli_real_escape_string($db_connection, $_POST['serviceprice']);
        
        if (!is_numeric($serviceprice)) {
            $price_error = "*Only numbers are allowed!*";
            $errors++;
        } else {
            $serviceprice = number_format((float)$serviceprice, 2, '.', '');
            unset($price_error);
        }
    }


    // Service duration validation
    if (empty($_POST['serviceduration'])) {
        $dur_error = "*Duration cannot be blank!*";
        $errors++;
    } else {
        $serviceduration = mysqli_real_escape_string($db_connection, $_POST['serviceduration']);
        
        if (!ctype_digit($serviceduration)) {
            $dur_error = "*Only whole numbers are allowed!*";
            $errors++;
        } else {
            unset($dur_error);
        }
    }


    // Check if an image file was uploaded
    if (!empty($_FILES["image"]["name"])) {
        // Image upload and validation
        $fileName = $_FILES["image"]["name"];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif", "JPG");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetDir = "Photos/Services/";
        $newFileName = $servicetitle_hidden . "." . $ext; // Assuming $servicetitle_hidden is unique for each service
        $targetPath = $targetDir . $newFileName;

        if (in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $image_query_part = ", Service_image = '$newFileName'";
            } else {
                $image_error = "Image upload failed.";
                $errors++;
            }
        } else {
            $image_error = "*Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.*";
            $errors++;
        }
    } else {
        $image_query_part = ""; // No image update if no image was uploaded
    }

    if ($errors == 0) {
        // Construct the query
        $query = "UPDATE tbl_services SET 
                service = '$servicetitle', 
                service_description = '$serviceDesc', 
                price = '$serviceprice', 
                duration = '$serviceduration', 
                Service_Category = '$servicetherapy' 
                $image_query_part 
            WHERE service = '$servicetitle_hidden';";
            
        if (mysqli_query($db_connection, $query)) {
            echo "<script>
                alert('Service info is updated successfully!');
                window.location.href='admin-Services.php';
            </script>";
            } 

        } else {
            $image_error = "*Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.*";
        }
    } else {
        // Handle the case where there are errors
        if ($image_error) {
            echo "<script>alert('$image_error');</script>";
        }
    }

?>
