<?php

    // these are the variables for connecting MySQL database
    $server = "localhost";
    $user = "A01";
    $password = "password_A01";
    $database = "A01";

    // init the connection
    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // verify login information
    $login = FALSE;
    $cookie_name = "A01_login_cookie";
    $role = "User";
    if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == "True") {
        // check if the user has logged in previously from cookie
        $login = TRUE;
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // log post body
        error_log('"'.str_replace("/var/www/html", "", __FILE__).'" "POST" "'.http_build_query($_POST).'"');
                
        // check the login credential from database
        $sql = $conn->prepare("SELECT * from users WHERE email=? AND studentNumber=? AND role=?;");
        $sql->bind_param("sss", $_POST["username"], $_POST["password"], $role);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows == 1) {
            $login = TRUE;
        }
        $sql->close();
    }

    if (!$login) {
        // redirect to login failed page
        header("location: loginFail.html");
    } else {
        // set a login cookie to identify logged in user
        setcookie($cookie_name, "True", time() + (86400 * 365), "/"); 
    }

    // getting the user data from database
    $sql = $conn->prepare("SELECT * from users WHERE email=?;");
    $sql->bind_param("s", $_POST["username"]);
    $sql->execute();
    $result = $sql->get_result();

    $sql->close();
    $conn->close();

?>

<?php // use the html content in dashboard.php  ?>
<?php include "dashboard.php"; ?>