<?php
if(isset($_POST['submit'])){
    //set database connection
    include("db_connect.php");

    //error validation variables
    $prd_error = $price_error = $image_error = "";
    $errors = 0;

    //INPUT VALIDATION - check each input in registration form

    $productname_hidden = mysqli_real_escape_string($db_connection, $_POST['productname_hidden']);
    $itemcategory = mysqli_real_escape_string($db_connection, $_POST['itemcategory']);

    //servicetitle_hidden
    if (empty($_POST['productname'])) {
        $sv_error = "*Product name cannot be blank!*";
        $errors++;
    } else {
        $productname = mysqli_real_escape_string($db_connection, $_POST['productname']);
    
        // Check if servicetitle is equal to servicetitle_hidden
        if ($productname === $productname_hidden) {
            $productname = $productname_hidden;
            unset($prd_error);
        } else {
            // Create query to check existing service title in the database
            $Servquery = "SELECT * FROM tbl_products WHERE product_name = '$productname'";
            $Servresult = $db_connection->query($Servquery);

            // Check if the service title already exists
            if ($Servresult && mysqli_num_rows($Servresult) > 0) {
                $prd_error = "*This service title already exists!*";
                $errors++;
            } else {
                // No error for service title input
                unset($prd_error);
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
        $newFileName = $productname_hidden . "." . $ext; // Assuming $servicetitle_hidden is unique for each service
        $targetPath = $targetDir . $newFileName;

        if (in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $image_query_part = ", item_img = '$newFileName'";
            } else {
                $image_error = "*Image upload failed.*";
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
        $query = "UPDATE tbl_products SET 
                product_name = '$productname', 
                price = '$Productprice', 
                item_category = '$itemcategory' 
                $image_query_part 
            WHERE product_name = '$productname_hidden';";
            
        if (mysqli_query($db_connection, $query)) {

            echo "<script>
                    alert('Product info is updated successfully!');
                    window.location.href='admin-products.php';
                </script>";
                } 

        } 
    } else {
        // Handle the case where there are errors
        if ($image_error) {
            echo "<script>alert('$image_error');</script>";
        }
    }

?>
