<?php

    // get the log content from log file
    $log = shell_exec("cat log.txt");

    // separate the log into array
    $data = explode('"', $log);
    // echo "$log";
	
?>

<html>
    <head>
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>This is a simple log paraser</h1>
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
                for ($i = 0; $i < count($data) - 20; $i += 20) {
                    echo "<tr>";
                    for ($j = 1; $j < 20; $j += 2) {
                        $k = $i + $j;
                        if ($data[$k] == "") {
                            $data[$k] = "-";
                        }
                        echo "<td>$data[$k]</td>";
                    }
                    echo "</tr>";
                }
            ?>
            </tbody>
    </table>
    </body>
</html>
