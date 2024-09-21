<?php
session_start();
include("admin_session.php");

if(isset($_POST['submit'])){
    // Set database connection
    include("db_connect.php");

    // Error validation variables
    $prd_error = $price_error = $image_error = "";
    $errors = 0;

    // INPUT VALIDATION - Check each input in the registration form

    $product_name = mysqli_real_escape_string($db_connection, $_POST['product_name']);
    $itemcategory = mysqli_real_escape_string($db_connection, $_POST['itemcategory']);

    // servicetitle_hidden
    if (empty($_POST['product_name'])) {
        $prd_error = "*Product name cannot be blank!*";
        $errors++;
    } else {
        $product_name = mysqli_real_escape_string($db_connection, $_POST['product_name']);
    
        // Create query to check existing service title in the database
        $Servquery = "SELECT * FROM tbl_products WHERE product_name = '$product_name'";
        $Servresult = $db_connection->query($Servquery);
    
        // Input validation for service title
        if ($Servresult) {
            if (mysqli_num_rows($Servresult) > 0) {
                $prd_error = "*This product name already exists!*";
                $errors++;
            } else {
                // No error for service title input   
                unset($sv_error);
            }
        }
    }
    

        
        // Service price validation
        if (empty($_POST['Productprice'])) {
            $price_error = "*Price cannot be blank!*";
            $errors++;
        } else {
            $Productprice = mysqli_real_escape_string($db_connection, $_POST['Productprice']);
            
            if (!is_numeric($Productprice)) {
                $price_error = "*Only numbers are allowed!*";
                $errors++;
            } else {
                $Productprice = number_format((float)$Productprice, 2, '.', '');
                unset($price_error);
            }
        }

    // Check if an image file was uploaded
    if (!empty($_FILES["image"]["name"])) {
        // Image upload and validation
        $fileName = $_FILES["image"]["name"];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetDir = "Photos/Products/";
        $newFileName = $product_name . "." . $ext; // Assuming $servicetitle_hidden is unique for each service
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
        $image_query_part = 'PRODUCT_DEFAULT.jpg'; // No image update if no image was uploaded
    }

    if ($errors == 0) {
        // Construct the query
        $query = "INSERT INTO tbl_products (product_name, price, item_category, item_img)
                    VALUES ('$product_name', '$Productprice', '$itemcategory', '$image_query_part')";
            
        if (mysqli_query($db_connection, $query)) {

            echo "<script>
                alert('$product_name successfully added on the list');
                window.location.href='admin-products.php';
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
