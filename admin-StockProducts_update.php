<?php
if(isset($_POST['submit'])){
    //set database connection
    include("db_connect.php");

    //error validation variables
    $qty_error = "";
    $errors = 0;

    //INPUT VALIDATION - check each input in registration form

    $productname_hidden = mysqli_real_escape_string($db_connection, $_POST['productname_hidden']);
    $itemQty = mysqli_real_escape_string($db_connection, $_POST['ProductQty']);
    

    // Service price validation
if (empty($_POST['ProductQty']) && $_POST['ProductQty'] !== '0') {
    $qty_error = "*Quantity cannot be blank!*";
    $errors++;
} else {
    $ProductQty = mysqli_real_escape_string($db_connection, $_POST['ProductQty']);
    
    if (!is_numeric($ProductQty) || floor($ProductQty) != $ProductQty || $ProductQty < 0) {
        $qty_error = "*Only whole, non-negative numbers are allowed!*";
        $errors++;
    } else {
        unset($qty_error); // This should be the correct error variable to unset
    }
}

    if ($errors == 0) {
        // Construct the query
        $query = "UPDATE tbl_products SET 
                stock = '$ProductQty' 
            WHERE product_name = '$productname_hidden';";
            
        if (mysqli_query($db_connection, $query)) {

            echo "<script>
                    alert('Item stocks is updated successfully!');
                    window.location.href='admin-Inventories.php';
                </script>";
                } 

        } 
    }

?>
