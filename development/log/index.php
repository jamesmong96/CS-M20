<?php

    // get the log content from log file
    $log = shell_exec("cat log.txt");

    // separate the log into array
    $data = explode('"', $log);
    // echo "$log";

    // save all the data in the array
    $log = [];
    for ($i = 0; $i < count($data) - 20; $i += 20) {
        $entry = [];
        for ($j = 1; $j < 20; $j += 2) {
            $k = $i + $j;
            if ($data[$k] == "") {
                $data[$k] = "-"; // replace empty string with -
            }
            array_push($entry, $data[$k]);
        }
        array_push($log, $entry);
    }
	
?>

<html>
    <head>
        <title>Project Log</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js.map"></script>
    </head>
    <body>
        <h1>Simple log parser</h1>
        <br>
        <table class="table table-striped table-hover" style="width: auto;">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Remote hostname</th>
                    <th>Request method</th>
                    <th>URL path</th>
                    <th>Query string</th>
                    <th>Request protocol</th>
                    <th>Status code</th>
                    <th>Byte sent</th>
                    <th>Referer header</th>
                    <th>User-Agent header</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php 
                    for ($i = count($log); $i > 0; $i--) {

                        // check if the request comes from localhost
                        if ($log[$i][1] == "::1") {
                            continue;
                        }

                        // output the content to page
                        echo "<tr>";
                        for ($j = 0; $j < count($log[$i]); $j++) {
                            echo "<td>".htmlspecialchars($log[$i][$j])."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
