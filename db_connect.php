<?php
        $host_name = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "giw_db";

        //create db connection
        $db_connection = mysqli_connect($host_name, $db_user, $db_pass, $db_name); 

        //check db connection
        if(mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }
?>