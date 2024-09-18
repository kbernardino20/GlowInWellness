<?php
include("db_connect.php");

if (isset($_GET['ordernum'])) {
    // Decode the order number in case it contains special characters
    $Ref_no = urldecode($_GET['ordernum']); 

    // Prepare the first search query to get the order details
    $search_query = $db_connection->prepare("SELECT * FROM tbl_confirmorder WHERE Ref_No = ?");
    $search_query->bind_param("s", $Ref_no);
    $search_query->execute();
    $search_queryresult = $search_query->get_result();

    while ($row = $search_queryresult->fetch_assoc()) {
        // Convert quantity_confirm to integer for arithmetic operations
        $quantity_confirm = (int)$row['quantity'];
        $product_name = $row['product_name'];

        // Prepare the second search query to get the current stock of the product
        $search_query2 = $db_connection->prepare("SELECT * FROM tbl_products WHERE product_name = ?");
        $search_query2->bind_param("s", $product_name);
        $search_query2->execute();
        $search_queryresult2 = $search_query2->get_result();

        while ($row2 = $search_queryresult2->fetch_assoc()) {
            $quantity_current = (int)$row2['stock'];
            $updated_stock = $quantity_current + $quantity_confirm;

            // Prepare the update query to update the stock in the tbl_products table
            $update_stock_query = $db_connection->prepare("UPDATE tbl_products SET stock = ? WHERE product_name = ?");
            $update_stock_query->bind_param("is", $updated_stock, $product_name);
            $update_stock_query->execute(); // Execute the update query

            // Prepare the delete queries to remove the order from tbl_confirmorder and tbl_orderhistory
            $delete_query = $db_connection->prepare("DELETE FROM tbl_confirmorder WHERE Ref_No = ? AND product_name = ?");
            $delete_query->bind_param("ss", $Ref_no, $product_name);
            $delete_query->execute(); // Execute the first delete query

            $delete_query2 = $db_connection->prepare("DELETE FROM tbl_orderhistory WHERE Ref_No = ?");
            $delete_query2->bind_param("s", $Ref_no);
            $delete_query2->execute(); // Execute the second delete query


            echo "<script>
                    alert('Your order with the order number $Ref_no been cancelled.');
                    window.location.href='user-MyOrders.php';
                </script>";

            // Close the prepared statements within the loop
            $update_stock_query->close();
            $delete_query->close();
            $delete_query2->close();
        }

        // Close the second search query
        $search_query2->close();
    }

    // Close the first search query
    $search_query->close();
    $db_connection->close();
}
?>
