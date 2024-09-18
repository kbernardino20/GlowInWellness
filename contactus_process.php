<?php
if (isset($_POST['submit'])) {
    // Set database connection
    include("db_connect.php");

    // INPUT VALIDATION - Check each input in the registration form
    $name = mysqli_real_escape_string($db_connection, $_POST['name']);
    $email = mysqli_real_escape_string($db_connection, $_POST['email']);
    $message = mysqli_real_escape_string($db_connection, $_POST['message']);
    $subject = mysqli_real_escape_string($db_connection, $_POST['subject']);
    $markread = "unread";
    $date_received = date('d/m/Y');
    $msg_id = "WELL" . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

    $query = "INSERT INTO tbl_messages (msg_id, name, email, subject, messages, markread, date_received)
              VALUES ('$msg_id' , '$name', '$email', '$subject', '$message', '$markread', '$date_received')";

    if (mysqli_query($db_connection, $query)) {
        echo "<script>
                alert('Your message has been sent! We will contact you as soon as possible!');
                window.location.href='index.php';
            </script>";
    } else {
        echo "<script>
                alert('There was an error sending your message. Please try again.');
                window.location.href='index.php';
            </script>";
    }
}


if (isset($_POST['submitfloat'])) {
    // Set database connection
    include("db_connect.php");

    // INPUT VALIDATION - Check each input in the registration form
    $name = mysqli_real_escape_string($db_connection, $_POST['namefloat']);
    $email = mysqli_real_escape_string($db_connection, $_POST['emailfloat']);
    $message = mysqli_real_escape_string($db_connection, $_POST['messagefloat']);
    $subject = mysqli_real_escape_string($db_connection, $_POST['subjectfloat']);
    $markread = "unread";
    $date_received = date('d/m/Y');
    $msg_id = "WELL" . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

    $query = "INSERT INTO tbl_messages (msg_id, name, email, subject, messages, markread, date_received)
              VALUES ('$msg_id' , '$name', '$email', '$subject', '$message', '$markread', '$date_received')";

    if (mysqli_query($db_connection, $query)) {
        echo "<script>
                alert('Your message has been sent! We will contact you as soon as possible!');
                window.location.href='index.php';
            </script>";
    } else {
        echo "<script>
                alert('There was an error sending your message. Please try again.');
                window.location.href='index.php';
            </script>";
    }
}
?>