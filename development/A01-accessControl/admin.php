<?php

    // mysql variables
    $server = "localhost";
    $user = "A01";
    $password = "password_A01";
    $database = "A01";

    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // check login status
    $login = FALSE;
    $cookie_name = "A01_login_cookie";
    if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == "True") {
        // get login from cookie
        $login = TRUE;
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get login from database
        $sql = $conn->prepare("SELECT * from users WHERE email=? AND studentNumber=? AND role='admin';");
        $sql->bind_param("ss", $_POST["username"], $_POST["password"]);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            $login = TRUE;
        }
        $sql->close();
    }

    // redirect to login failed page
    if (!$login) {
        header("location: loginFail.html");
    } else {
        setcookie($cookie_name, "True", time() + (86400 * 365), "/"); // set a cookie which last 1 year
    }

    // getting all data
    $sql = "SELECT * from users;";
    $result = $conn->query($sql);

    $conn->close();

// TODO:
// 1. change the time of cookie
// 2. add more info to the cookie
// 3. [optional] dont rely cookie to remember logged in or not, use it to store identity and use that identity in mysql
// 4. security by obscurity 

?>

<html>
    <head>
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>This is admin page</h1>
        <br>
        <table class="table table-striped table-hover" style="width: auto;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Birthday</th>
                    <th>Student Number</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php 
                    // output the selected data to table
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["role"]."</td>";
                            echo "<td>".$row["firstName"]." ".$row["lastName"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td>".$row["mobileNumber"]."</td>";
                            echo "<td>".$row["birthday"]."</td>";
                            echo "<td>".$row["studentNumber"]."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>