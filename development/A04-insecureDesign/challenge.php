<html>
    <head>
        <title>A04 - Challenge</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js.map"></script>
        <!-- custom css for this page -->
        <link rel="stylesheet" href="css/challenge.css">
    </head>
    <body class="text-center">
        <main class="form-signin w-100 m-auto">
            <form action = "./challenge.php" method = "post" onsubmit="">
                <h1 class="h1 mb-3 fw-normal">Broadcast</h1>
                <h3 class="h3 mb-3 fw-normal"><u>NO CURSING</u></h3>
                <h5 class="h5 mb-3 fw-normal">
                    <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            echo htmlspecialchars($_POST["real_message"]);
                        }
                    ?>
                </h5>
                <div class="form-floating">
                    <input class="form-control" id="message" placeholder="message" name="message" onchange="document.getElementById('message').value.search(/duck/gi) == -1 ? document.getElementById('real_message').value = 'You said: ' + document.getElementById('message').value : document.getElementById('real_message').value = 'NO CURSING!' ;">
                    <label for="floatingInput">Message</label>
                    <input id="real_message" name="real_message" hidden>
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit" value="Submit">Send</button>
            </form>
          </main>
    </body>
</html>