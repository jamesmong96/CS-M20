<?php

    // these are the variables for connecting MySQL database
    $server = "localhost";
    $user = "A03";
    $password = "password_A03";
    $database = "A03";

    // init the connection
    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = $conn->prepare("DELETE FROM records;");
    $sql->execute();

    $sql = $conn->prepare("DELETE FROM users;");
    $sql->execute();

    for ($i = 0; $i < 3; $i++) {
        $username = "username0".strval($i)."0".strval($i);
        $password = "password0".strval($i)."0".strval($i);
        $role = "User";
        $sql = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $username, $password, $role);
        $sql->execute();
    }

    $sql->close();
    $conn->close();
    
?>
<html>
    <head>
        <title>A03 - Reset</title>
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