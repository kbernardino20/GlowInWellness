<?php

session_start();
include("user_session.php");
// Generate a unique order number starting with GIW followed by an 8-digit random number
$orderNumber = "GLOW" . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

// Assuming you have already connected to the database using db_connect.php
include("db_connect.php");

// Check if the connection was successful
if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error);
}

// Retrieve the necessary variables
$email = $_SESSION['email'];
$bookingDate = date("d/m/Y"); // Today's date in dd/mm/yyyy format
$cname = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
$Mobnum = $_SESSION['mobile_num'];
$Stats = "Ready for pick up";
$pickup = "-";
$Total_order = isset($_POST['total_order']) ? $_POST['total_order'] : 0;

// Prepare and execute the select statement
$query2 = "SELECT * FROM tbl_orders WHERE email = ?";
$stmt2 = $db_connection->prepare($query2);
$stmt2->bind_param("s", $email);
$stmt2->execute();
$result2 = $stmt2->get_result();

// Query to get the sum of total sales for the user
$queryTotalSales = "SELECT SUM(total) as total_sales FROM tbl_orders WHERE email = ?";
$stmtTotalSales = $db_connection->prepare($queryTotalSales);
$stmtTotalSales->bind_param("s", $email);
$stmtTotalSales->execute();
$resultTotalSales = $stmtTotalSales->get_result();

// Fetch the total sales value
if ($resultTotalSales && $resultTotalSales->num_rows > 0) {
    $rowTotalSales = $resultTotalSales->fetch_assoc();
    // Format total sales to 2 decimal points
    $total_sales = number_format($rowTotalSales['total_sales'], 2);
}


// Check inventory before processing the order
$isStockAvailable = true;

if ($result2 && $result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        // Query to check current stock
        $stockCheckStmt = $db_connection->prepare("SELECT stock FROM tbl_products WHERE product_name = ?");
        $stockCheckStmt->bind_param("s", $row['product_name']);
        $stockCheckStmt->execute();
        $stockCheckStmt->bind_result($currentStock);
        $stockCheckStmt->fetch();
        $stockCheckStmt->close();

        if ($currentStock < $row['quantity']) {
            $isStockAvailable = false;
            break;
        }
    }

    if ($isStockAvailable) {
        // Inventory is sufficient, proceed with order processing

        // Reset result2 pointer and iterate again for insertion
        $result2->data_seek(0);

        $stmt3 = $db_connection->prepare("INSERT INTO tbl_orderhistory (Ref_No, date_ordered, Total_order, name, email, status, pickup_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param("sssssss", $orderNumber, $bookingDate, $Total_order, $cname, $email, $Stats, $pickup);
        $stmt3->execute();
        $stmt3->close();

        while ($row = $result2->fetch_assoc()) {
            // Prepare the insert statement
            $stmt = $db_connection->prepare("INSERT INTO tbl_confirmorder (Ref_No, date_ordered, product_name, item_category, price, quantity, total, Total_order, name, mobile_num, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $orderNumber, $bookingDate, $row['product_name'], $row['item_category'], $row['price'], $row['quantity'], $row['total'], $Total_order, $cname, $Mobnum, $email);

            if ($stmt->execute()) {
                // Update stock inventory
                $updateStmt = $db_connection->prepare("UPDATE tbl_products SET stock = stock - ? WHERE product_name = ?");
                $updateStmt->bind_param("is", $row['quantity'], $row['product_name']);
                $updateStmt->execute();

                // SQL statement to delete from tbl_orders
                $sql = "DELETE FROM tbl_orders WHERE email = ?";
                $stmtDelete = $db_connection->prepare($sql);
                $stmtDelete->bind_param("s", $email);
                $stmtDelete->execute();

                // JavaScript alert for successful booking and deletion
                echo "<script>
                    alert('Your order has been submitted. Your order number is $orderNumber.');
                    window.location.href='user-ProductOrder_Confirmation.php?orderNumber=" . urlencode($orderNumber) . "';
                </script>";
            }

            $stmt->close();
        }
    } else {
        // Stock is not sufficient, display an error message
        echo "<script>
            alert('Insufficient stock for one or more products. Please adjust your order.');
            window.location.href='user-MyOrders.php';
        </script>";
    }
}

$stmt2->close();
$stmtTotalSales->close();
$db_connection->close();


?>
