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

    $default = "0";
    $sql = $conn->prepare("UPDATE users SET responses=?;");
    $sql->bind_param("s", $default);
    $sql->execute();

    $conn->close();
    
?>
<html>
    <head>
        <title>A02 - Reset</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>The database is reset</h1>
    </body>
</html>