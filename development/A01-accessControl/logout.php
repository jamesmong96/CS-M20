<?php
    // delete the cookie and redirect to user login page
    $cookie_name = "A01_login_cookie";
    setcookie($cookie_name, "", time() - 1000, "/");
    header("location: userLogin.html");
?>