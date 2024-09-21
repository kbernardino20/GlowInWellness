<?php
if(isset($_POST['submit'])){
    // Set database connection
    include("db_connect.php");

    // Error validation variables
    $sv_error = $desc_error = $price_error = $image_error = $dur_error = "";
    $errors = 0;

    // INPUT VALIDATION - Check each input in the registration form

    $servicetitle = mysqli_real_escape_string($db_connection, $_POST['servicetitle']);
    $servicetherapy = mysqli_real_escape_string($db_connection, $_POST['therapy']);

    // servicetitle_hidden
    if (empty($_POST['servicetitle'])) {
        $sv_error = "*Service Title cannot be blank!*";
        $errors++;
    } else {
        $servicetitle = mysqli_real_escape_string($db_connection, $_POST['servicetitle']);
    
        // Create query to check existing service title in the database
        $Servquery = "SELECT * FROM tbl_services WHERE service = '$servicetitle'";
        $Servresult = $db_connection->query($Servquery);
    
        // Input validation for service title
        if ($Servresult) {
            if (mysqli_num_rows($Servresult) > 0) {
                $sv_error = "*This service title already exists!*";
                $errors++;
            } else {
                // No error for service title input   
                unset($sv_error);
            }
        }
    }
    

    // servicedesc
    if(empty($_POST['servicedesc'])){
        $desc_error = "*Service description cannot be blank!*";
        $errors++;
    } else {
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
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetDir = "Photos/Services/";
        $newFileName = $servicetitle . "." . $ext; // Assuming $servicetitle_hidden is unique for each service
        $targetPath = $targetDir . $newFileName;

        if (in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $image_query_part = $newFileName;
            } else {
                $image_error = "*Image upload failed.*";
                $errors++;
            }
        } else {
            $image_error = "*Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.*";
            $errors++;
        }
    } else {
        $image_query_part = 'SERVICE_DEFAULT.jpg'; // No image update if no image was uploaded
    }

    if ($errors == 0) {
        // Construct the query
        $query = "INSERT INTO tbl_services (service, service_description, price, Service_Category, Service_image, duration)
                    VALUES ('$servicetitle', '$serviceDesc', '$serviceprice', '$servicetherapy', '$image_query_part', '$serviceduration' )";
            
        if (mysqli_query($db_connection, $query)) {
            
            echo "<script>
                alert('$servicetitle successfully added on to the service list');
                window.location.href='admin-Services.php';
            </script>";

        } 
    } else {
        // Handle the case where there are errors
        if ($image_error) {
            echo "<script>alert('$image_error');</script>";
        }
    }
}

?>
