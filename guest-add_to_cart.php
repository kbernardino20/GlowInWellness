<?php
include("db_connect.php");

session_start();
if (isset($_GET['selectedproducts']) && isset($_GET['selectedprice'])) {
    // Retrieve the product details from the URL parameters
    $product_name = isset($_GET['selectedproducts']) ? $_GET['selectedproducts'] : '';
    $price = isset($_GET['selectedprice']) ? $_GET['selectedprice'] : '';

    // Sanitize the input
    $product_name = $db_connection->real_escape_string($product_name);
    $price = floatval($price);
    $price_formatted = number_format($price, 2); // Format price to 2 decimal points

    // Get user email from session
    session_start();
    $user_email = session_id();

    // Check if the product already exists in tbl_orders for this email
    $check_query = $db_connection->prepare("SELECT * FROM tbl_guestorders WHERE product_name = ? AND email = ?");
    $check_query->bind_param("ss", $product_name, $user_email);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows > 0) {
        // Product exists for this user, update the quantity
        // Retrieve current quantity to calculate new total
        $row = $result->fetch_assoc();
        $current_quantity = intval($row['quantity']);
        $new_quantity = $current_quantity + 1;
        $total = number_format($new_quantity * $price, 2); // Format total to 2 decimal points

        $update_query = $db_connection->prepare("UPDATE tbl_guestorders SET quantity = ?, total = ? WHERE product_name = ? AND email = ?");
        $update_query->bind_param("ssss", $new_quantity, $total, $product_name, $user_email);
        $update_query->execute();

        echo "<script>
            alert('$product_name has been added to your cart!');
            window.location.href='index.php';
        </script>";
    } else {
        // Determine the image based on the product name
        switch ($product_name) {
            case "Kuznea Relief Cream":
                $item_img = "cream.jpg";
                break;
            case "Mask 1":
                $item_img = "mask1.jpg";
                break;
            case "Mask 2":
                $item_img = "mask2.jpg";
                break;
            case "Mask 3":
                $item_img = "mask3.jpg";
                break;
            case "Sports tape":
                $item_img = "tape.jpg";
                break;
            default:
                $item_img = "default.jpg"; // fallback in case the product name doesn't match
        }

        // Product doesn't exist for this user, insert it with quantity = 1
        $total = number_format($price, 2); // Format total to 2 decimal points
        $insert_query = $db_connection->prepare("INSERT INTO tbl_guestorders (product_name, price, quantity, total, email, item_img) VALUES (?, ?, '1', ?, ?, ?)");
        $insert_query->bind_param("sssss", $product_name, $price_formatted, $total, $user_email, $item_img);
        $insert_query->execute();

        echo "<script>
            alert('$product_name has been added to your cart!');
            window.location.href='index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid product details.');
        window.location.href='index.php';
    </script>";
}
?>
