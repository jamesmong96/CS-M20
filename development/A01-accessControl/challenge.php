<?php

    $server = "localhost";
    $user = "A01";
    $password = "password_A01";
    $database = "A01";

    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $admin = FALSE;
    $cookie_name = "A01_login_cookie_challenge";
    if (!isset($_COOKIE[$cookie_name])) {
        setcookie($cookie_name, 'User', time() + (86400 * 365), "/"); 
    }

    if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == 'Admin') {
        $admin = TRUE;
    } 

    if (!$admin) {
        $user = "peter.cameron738@example.com";
        $sql = $conn->prepare("SELECT * from users WHERE email=?;");
        $sql->bind_param("s", $user);
    } else {
        $sql = $conn->prepare("SELECT * from users;");
    }

    $sql->execute();
    $result = $sql->get_result();
    $conn->close();
?>
<?php include "dashboard.php"; ?>