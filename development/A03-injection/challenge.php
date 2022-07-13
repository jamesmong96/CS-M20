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

    // default login failed
    $login = -1;
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        
        $login = 0;

        // log post body
        error_log('"'.str_replace("/var/www/html", "", __FILE__).'" "POST" "'.http_build_query($_POST).'"');

        // select the login info from database
        $sql = "SELECT * FROM users WHERE username='".substr(trim($_POST["username"]), 0, 15)."' AND password=''";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $login = 1;
        }
    
    }

    // $sql->close();
    $conn->close();

?>
<html>
    <head>
        <title>A03 - Challenge</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js.map"></script>
        <!-- custom css for this page -->
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body class="text-center">
        <main class="form-signin w-100 m-auto">
            <form action = "./challenge.php" method = "post">
                <h1 class="h1 mb-3 fw-normal">User Console</h1>
                <img class="mb-4" src="image/login.png" alt="" width="72" height="72">
                <h3 class="h3 mb-3 fw-normal">Please sign in</h3>
                <h5 class="h5 mb-3 fw-normal">
                    <?php 
                        if ($login == 1) {
                            echo "<span class='text-success'>Login succeed!<br>Username: [".htmlspecialchars(substr(trim($_POST["username"]), 0, 15))."]<br>password: [".str_ireplace("script", "", $_POST['password'])."]</span>";
                        } else if ($login == 0) {
                            echo "<span class='text-danger'>Login failed!<br>Username: [".htmlspecialchars(substr(trim($_POST["username"]), 0, 15))."]<br>password: [".str_ireplace("script", "", $_POST['password'])."]</span>";
                        }
                    ?>
                </h5>
                <div class="form-floating">
                    <input class="form-control" id="floatingInput" placeholder="username" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
            
                <button class="w-100 btn btn-lg btn-primary" type="submit" value="Submit">Sign in</button>
            </form>
          </main>
    </body>
</html>