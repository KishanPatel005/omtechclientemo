<?php
    // Database Connection
    // $con = mysqli_connect("localhost", "u371855741_omtech", "@Omtech12", "u371855741_omtech");

        $con = mysqli_connect("localhost", "root", "", "omtech");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Set Timezone to Asia/Kolkata
    date_default_timezone_set('Asia/Kolkata');

    // Optional: Set timezone for the MySQL session as well
    mysqli_query($con, "SET time_zone = '+05:30'");
?>