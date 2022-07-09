<?php

    // these are the variables for connecting MySQL database
    $server = "localhost";
    $user = "A02";
    $password = "password_A02";
    $database = "A02";

    // init the connection
    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // check are there any forms submitted
    $valid = 0;
    if (isset($_POST["code"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])) {

        // check the identification code validity
        $valid = 1;
        $code = hex2bin($_POST["code"]);
        if (substr_count($code, "-") == 2) {
    
            // retrieve info from the identification code
            $first_name = explode("-", $code)[0];
            $last_name = explode("-", $code)[1];
            $id = explode("-", $code)[2];
    
            if ($first_name == trim($_POST["firstName"]) && $last_name == trim($_POST["lastName"])) {
    
                // check database record
                $sql = $conn->prepare("SELECT * from users WHERE firstName=? AND lastName=? AND id=?;");
                $sql->bind_param("sss", $first_name, $last_name, $id);
                $sql->execute();
                $result = $sql->get_result();
                
                if ($result->num_rows == 1) {
                    $valid = 2;
    
                    // update the responses status
                    $sql = $conn->prepare("UPDATE users SET responses='1' where id=?;");
                    $sql->bind_param("s", $id);
                    $sql->execute();
                }
            }
        }
    }

    
    // getting the user data from database
    $sql = $conn->prepare("SELECT * from users;");
    $sql->execute();
    $result = $sql->get_result();

    $conn->close();

?>
<html>
    <head>
        <title>A02 - Survey</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
        <style>
            .container {
                max-width: 960px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="./image/survey.png" alt="" width="72" height="72">
                    <h2>Survey</h2>
                    <p class="lead">Please use the identification code sent to your email address to complete the survey on your behalf.</p>
                </div>
        
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Responses Summary</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php 
                                // output the selected data to table
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {

                                        // get the respond status of the user
                                        if ($row["responses"] == "0") {
                                            $status = "<div class='text-danger'>";
                                            $response = "<small>Survey Incomplete</small>";
                                        } else {
                                            $status = "<div class='text-success'>";
                                            $response = "<small>Survey Complete</small>";
                                        }

                                        echo "<li class='list-group-item d-flex justify-content-between lh-sm'>";
                                        echo $status;
                                        echo "      <h6 class='my-0'>".$row["firstName"]." ".$row["lastName"]."</h6>";
                                        echo $response;
                                        echo "  </div>";
                                        echo "  <span class='text-muted'>ID: ".$row["id"]."</span>";
                                        echo "</li>";
                                    }
                                } else {
                                    echo "<li class='list-group-item d-flex justify-content-between lh-sm'>";
                                    echo "  <div>";
                                    echo "      <h6 class='my-0'>Error</h6>";
                                    echo "      <small class='text-muted'>No users are found</small>";
                                    echo "  </div>";
                                    echo "  <span class='text-muted'>N.A.</span>";
                                    echo "</li>";
                                }
                            ?>
                        </ul>
                    </div>

                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Feedback</h4>
                        <form action = "./survey.php" method = "post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="feedback1" class="form-label">When did you last use our services?</label>
                                    <input type="text" class="form-control" id="feedback1" placeholder="" value="" required="">
                                </div>

                                <div class="col-12">
                                    <label for="feedback2" class="form-label">How much you spend on your last order?</label>
                                    <input type="text" class="form-control" id="feedback2" placeholder="" value="" required="">
                                </div>

                                <div class="col-12">
                                    <label for="feedback3" class="form-label">Do you buy any frozen food from us in your last order?</label>
                                    <div class="form-check">
                                        <input id="credit" name="feedback3" type="radio" class="form-check-input" checked="" required="">
                                        <label class="form-check-label" for="feedback31">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="debit" name="feedback3" type="radio" class="form-check-input" required="">
                                        <label class="form-check-label" for="feedback32">No</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="feedback4" class="form-label">Do you have any additional comments?</label>
                                    <input type="text" class="form-control" id="feedback4" placeholder="" value="" required="">
                                </div>
                
                                <div>
                                    <label><strong>Gifts will be sent to you for completing the survey. Thanks for supporting us!</strong></label>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Shipping address</label>
                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                                </div>

                                <div class="col-md-5">
                                    <label for="gift1" class="form-label">Gift #1</label>
                                    <select class="form-select" id="gift1" required="">
                                        <option value="">Choose...</option>
                                        <option>High five</option>
                                        <option>Hug</option>
                                        <option>Nod</option>
                                    </select>
                                </div>
                
                                <div class="col-md-5">
                                    <label for="gift2" class="form-label">Gift #2</label>
                                    <select class="form-select" id="gift2" required="">
                                        <option value="">Choose...</option>
                                        <option>Elbow bump</option>
                                        <option>Fist bump</option>
                                        <option>Handshake</option>
                                    </select>
                                </div>
                            </div>
                
                            <hr class="my-4">

                            <h4 class="mb-3">Agreement</h4>
                
                            <div class="my-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="agreement" required="">
                                    <label class="form-check-label" for="agreement">You agree the above information is accurate and completed by yourself</label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Identification</h4>
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="code" class="form-label">Identification code</label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="" required="">
                                    <small class="text-muted">Send to you via email previously</small>
                                </div>

                                <div class="col-md-6"></div>

                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" required="">
                                </div>
                            </div>
                
                            <hr class="my-4">

                            <?php 
                                if ($valid == 2) {
                                    echo "<div class='text-success'>";
                                    echo "    <label>Survey submitted</label>";
                                    echo "</div>";
                                } else if ($valid == 1) {
                                    echo "<div class='text-danger'>";
                                    echo "    <label>Invalid identification code</label>";
                                    echo "</div>";
                                }
                            ?>
                            
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Submit Survey</button>
                        </form>
                    </div>
                </div>
            </main>
        
            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">© 2017 - 2022 Random Company</p>
            </footer>
        </div>
    </body>
</html>