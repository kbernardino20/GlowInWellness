<?php
include("db_connect.php");
$query = "SELECT * 
            FROM tbl_bookingappointment 
            WHERE STR_TO_DATE(Appointment_date, '%d/%m/%Y') = CURDATE();";
$result = $db_connection->query($query);

if ($result) {
    $count = mysqli_num_rows($result);
    
}

$query2 = "SELECT * 
            FROM tbl_orderhistory
            WHERE status = 'Ready for pick up';";
$result2 = $db_connection->query($query2);

if ($result2) {
    $count2 = mysqli_num_rows($result2);   
}


$query3 = "SELECT * 
            FROM tbl_bookingappointment 
            WHERE STR_TO_DATE(Appointment_date, '%d/%m/%Y') < CURDATE();";
$result3 = $db_connection->query($query3);

if ($result3) {
    $count3 = mysqli_num_rows($result3);
    
}

$query4 = "SELECT * 
            FROM tbl_messages 
            WHERE markread = 'unread'";
$result4 = $db_connection->query($query4);

if ($result4) {
    $count4 = mysqli_num_rows($result4);
    
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
                        <p class="welcome-name" style="color: #ffffff;"><?php echo "Welcome," . " " .$_SESSION['first_name'] . " " . $_SESSION['last_name']; ?> (ADMIN)</p>
                        <div class="slider round"></div>
                    </label>
                </div>
            </li>
            <li>
                <a href="admin-BookingAppointments.php" class="transition">
                    <i class="far fa-calendar-alt"></i>
                    <?php if($count != 0) { echo "<span class='badge badge-danger notif'> $count </span>"; } ?>
                </a>
            </li>
            <li>
                <a href="admin-ProductOrders.php" class="transition">
                    <i class="fas fa-cart-plus"></i>
                    <?php if($count2 != 0) { echo "<span class='badge badge-danger notif'> $count2 </span>"; } ?>
                </a>
            </li>
            <li>
                <a href="admin-Notifications.php" class="transition">
                    <i class="fas fa-bell"></i>
                    <?php if($count3 != 0) { echo "<span class='badge badge-danger notif'> $count3 </span>"; } ?>
                </a>
            </li>
            <li>
                <a href="admin-Messages.php" class="transition">
                    <i class="fa fa-envelope"></i>
                    <?php if($count4 != 0) { echo "<span class='badge badge-danger notif'> $count4 </span>"; } ?>
                </a>
            </li>
            <li>
                <div class="dropdown">
                    <div class="dropdown-toggle" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="<?php echo "Photos/USER/" . $_SESSION['user_img']; ?>" alt="Profile">
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                        <a class="dropdown-item" href="admin-myProfile.php">
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