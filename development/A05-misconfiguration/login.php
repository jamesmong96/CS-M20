<?php

    // credentials are hardcoded for simplicity
    $username = "J0aPk1AW0AphnFDfdihz";
    $password = "2LjcutTcXtZH7XSn7zPj";
    $old_username = "jI6d7KeGzPAqTpQ0kwtQ";
    $old_password = "KYlqE29AIeZ4lCNoSHRq";

    $message = "Login failed";
    $debug = "Incorrect credentials";

    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        $message = "Login succeed";
        $debug = "You have logged in";
    } else if ($_POST["username"] == $old_username && $_POST["password"] == $old_password) {
        $message = "Login failed";
        $debug = "This account is deprecated, please find the updated account in ../resources/A05/password.txt";
    }
?>
<html>
    <head>
        <title>A05 - User Login</title>
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
            <form action = "./login.php" method = "post">
                <h1 class="h1 mb-3 fw-normal">User Console</h1>
                <img class="mb-4" src="image/login.png" alt="" width="72" height="72">
                <h3 class="h3 mb-3 fw-normal">Please sign in</h3>
                <h5 class="h5 mb-3 fw-normal">
                    <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if ($message == "Login succeed") {
                                echo "<span class='text-success'>Login succeed</span>";
                            } else {
                                echo "<span class='text-danger'>Login failed</span>";
                            }
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
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $debug != "") {
            echo "<script> console.log('".$debug."') </script>";
        }
    ?>
</html>