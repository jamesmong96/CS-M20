<?php

    $server = "localhost";
    $user = "A01";
    $password = "password_A01";
    $database = "A01";

    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstname = ["David", "John", "Michael", "Paul", "Andrew", "Peter", "James", "Robert", "Mark", "Richard", "Susan", "Stephen", "Margaret", "Sarah", "Christopher", "Ian", "Steven", "Thomas", "William", "Alan", "Anthony", "Patricia", "Elizabeth", "Mary", "Simon", "Julie", "Brian", "Karen", "Christine", "Daniel", "Helen", "Martin", "Emma", "Linda", "Matthew", "Kevin", "Jean", "Philip", "Jane", "Janet", "Lisa", "Gary", "Claire", "Nicola", "Colin", "Joan", "Graham", "Jennifer", "Barbara", "George"];
    $lastname = ["Smith", "Jones", "Taylor", "Brown", "Williams", "Wilson", "Johnson", "Davies", "Patel", "Robinson", "Wright", "Thompson", "Evans", "Walker", "White", "Roberts", "Green", "Hall", "Thomas", "Clarke", "Jackson", "Wood", "Harris", "Edwards", "Turner", "Martin", "Cooper", "Hill", "Ward", "Hughes", "Moore", "Clark", "King", "Harrison", "Lewis", "Baker", "Lee", "Allen", "Morris", "Khan", "Scott", "Watson", "Davis", "Parker", "James", "Bennett", "Young", "Phillips", "Richardson", "Mitchell"];
    // $email = strtolower($firstname).".".strtolower($lastname).str_pad(strval(rand(0,999)), 3, "0", STR_PAD_LEFT)."@example.com";
    // $mobile = "0".strval(rand(7000,7999))." ".str_pad(strval(rand(0,999999)), 6, "0", STR_PAD_LEFT);
    // $birth = strval(rand(1980,2003))."-".str_pad(strval(rand(1,12)), 2, "0", STR_PAD_LEFT)."-".str_pad(strval(rand(1,31)), 2, "0", STR_PAD_LEFT);
    // $id = "2".str_pad(strval(rand(101,199999)), 6, "0", STR_PAD_LEFT);
    // $sql = "INSERT INTO users (role, firstName, lastName, email, mobileNumber, birthday, studentNumber) VALUES ('User', 'Peter', 'Cameron', 'peter.cameron@example.com', '07946 864309', '1993-08-14', '2108475')";
	
    for ($i = 0; $i < 9; $i++) {
        $firsttemp = $firstname[rand(0,count($firstname) - 1)];
        $lasttemp = $lastname[rand(0,count($lastname) - 1)];
        $sql = "INSERT INTO users (role, firstName, lastName, email, mobileNumber, birthday, studentNumber) VALUES 
        ('User', '".$firsttemp."', 
        '".$lasttemp."', 
        '".strtolower($firsttemp).".".strtolower($lasttemp).str_pad(strval(rand(0,999)), 3, "0", STR_PAD_LEFT)."@example.com"."', 
        '"."0".strval(rand(7000,7999))." ".str_pad(strval(rand(0,999999)), 6, "0", STR_PAD_LEFT)."', 
        '".strval(rand(1980,2003))."-".str_pad(strval(rand(1,12)), 2, "0", STR_PAD_LEFT)."-".str_pad(strval(rand(1,31)), 2, "0", STR_PAD_LEFT)."', 
        '"."2".str_pad(strval(rand(101,199999)), 6, "0", STR_PAD_LEFT)."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

      
    $conn->close();

?>