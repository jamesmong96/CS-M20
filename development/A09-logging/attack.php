<?php

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);

    // submit buffer requests
    $url = "http://localhost/A09-logging/console.php";
    for ($i = 0; $i < 30; $i++) {
        $randomString = '';
        for ($j = 0; $j < rand(5, 20); $j++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        file_get_contents($url."?query=".$randomString);
    }

    // submit malicious request
    file_get_contents($url."?user=malicious");

    // submit buffer requests
    for ($i = 0; $i < 50; $i++) {
        $randomString = '';
        for ($j = 0; $j < rand(5, 20); $j++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        file_get_contents($url."?query=".$randomString);
    }
    
?>
<html>
    <head>
        <title>A09 - Attack</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>The malicious requests are generated</h1>
    </body>
</html>