<?php
include("db_connect.php");
$email = $_SESSION['email'];
$query = "SELECT * 
            FROM tbl_bookingappointment 
            WHERE email = '$email' 
            AND STR_TO_DATE(Appointment_date, '%d/%m/%Y') >= CURDATE();";
$result = $db_connection->query($query);

if ($result) {
    $count = mysqli_num_rows($result);
    
}

$query2 = "SELECT SUM(quantity) as total_quantity FROM tbl_orders WHERE email = '$email'";
$result2 = $db_connection->query($query2);

if ($result2) {
    $row = $result2->fetch_assoc();
    $count2 = $row['total_quantity'];
}
?>

<div class="topbar transition">
    <div class="left-items">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="las la-bars"></i>
            </button>
        </div>
        <div class="date-display">
            <i class="far fa-calendar"></i>
            <span class="date-label"> Date today: </span>
            <span id="current-date"></span>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li>
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <p class="welcome-name" style="color: white;"><?php echo "Welcome," . " " . $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></p>
                        <div class="slider round"></div>
                    </label>
                </div>
            </li>
            <li>
                <a href="user-MyAppointments.php" class="transition">
                    <i class="far fa-calendar-alt"></i>
                    <?php if ($count == 0) { } else { echo "<span class='badge badge-danger notif'> $count </span>"; } ?>
                </a>
            </li>
            <li>
                <a href="user-MyOrders.php" class="transition">
                    <i class="fas fa-cart-plus"></i>
                    <?php if ($count2 == 0) { } else { echo "<span class='badge badge-danger notif'> $count2 </span>"; } ?>
                </a>
            </li>
            <li>
                <div class="dropdown">
                    <div class="dropdown-toggle" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo "Photos/USER/" . $_SESSION['user_img']; ?>" alt="Profile">
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                        <a class="dropdown-item" href="user-myProfile.php">
                            <i class="las la-user mr-2"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i class="las la-sign-out-alt mr-2"></i> Sign Out
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>