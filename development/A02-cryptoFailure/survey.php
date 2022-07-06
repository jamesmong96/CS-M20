<?php

    // these are the variables for connecting MySQL database
    $server = "localhost";
    $user = "A02";
    $password = "password_A02";
    $database = "A02";

    // init the connection
    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->close();
    
?>