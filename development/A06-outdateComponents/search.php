<?php

    // these are the variables for connecting MySQL database
    $server = "localhost";
    $user = "A06";
    $password = "password_A06";
    $database = "A06";

	// init the connection
	$conn = mysqli_connect($server, $user, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
    // log post body
    error_log('"'.str_replace("/var/www/html", "", __FILE__).'" "GET" "'.http_build_query($_GET).'"');

	// check the login credential from database
	parse_str($_GET["search"]); // expected query=xxx

	if (isset($brand) && $brand != "") {
		$stmt = "SELECT * from products WHERE brand=?;";
		$sql = $conn->prepare($stmt);
		$sql->bind_param("s", $brand);
		$sql->execute();
		$result = $sql->get_result();

		$sql->close();

		while($row = $result->fetch_assoc()) {
			echo implode(",", $row);
		}
	}

	$conn->close();
?>
<html>
    <head>
        <title>A06 - Search</title>
        <link rel="icon" href="../resources/image/favicon.ico">
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/bootstrap.min.css.map">
        <script src="../resources/js/jquery-3.6.0.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js"></script>
        <script src="../resources/js/bootstrap.bundle.min.js.map"></script>
        <!-- custom css for this page -->
        <link rel="stylesheet" href="css/search.css">
    </head>
    <body>
		<header>
			<div class="bg-dark collapse" id="navbarHeader" style="">
				<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-7 py-4">
					<h4 class="text-white">About</h4>
					<p style="color: #6c757d!important;">This is the product search console of Random Company. You can browse all the available catalog here and find the products you like.</p>
					</div>
					<div class="col-sm-4 offset-md-1 py-4">
					<h4 class="text-white">Contact</h4>
					<ul class="list-unstyled">
						<li><a href="#" class="text-white">Follow on Twitter</a></li>
						<li><a href="#" class="text-white">Like on Facebook</a></li>
						<li><a href="#" class="text-white">Email me</a></li>
					</ul>
					</div>
				</div>
				</div>
			</div>
			<div class="navbar navbar-dark bg-dark shadow-sm">
				<div class="container">
				<a href="#" class="navbar-brand d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
					<strong>Search Console</strong>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				</div>
			</div>
		</header>
		<div class="container bootstrap snippets">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<h2>
								160 results found for: <span class="text-navy">"Bootdey"</span>
							</h2>
							<small>Request time  (0.23 seconds)</small>
				
							<div class="search-form">
								<form action="#" method="get">
									<div class="input-group">
										<input type="text" placeholder="Bootdey" name="search" class="form-control input-lg">
										<div class="input-group-btn">
											<button class="btn btn-lg btn-primary" type="submit">
												Search
											</button>
										</div>
									</div>
								</form>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="search-result">
								<h3><a href="#">Bootdey</a></h3>
								<a href="#" class="search-link">www.bootdey.com</a>
								<p>

								</p>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="search-result">
								<h3><a href="#">Bootdey</a></h3>
								<a href="#" class="search-link">https://bootdey.com/</a>
								<p>
								Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers
								</p>
							</div>
							<div class="hr-line-dashed"></div>

							<div class="search-result">
								<h3><a href="#">Bootdey | Facebook</a></h3>
								<a href="#" class="search-link">https://www.facebook.com/bootdey</a>
								<p>
								Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers
								</p>
							</div>
							<div class="hr-line-dashed"></div>

							<div class="search-result">
								<h3><a href="#">Bootdey | Twitter</a></h3>
								<a href="#" class="search-link">www.twitter.com/bootdey</a>
								<p>
									Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers
								</p>
							</div>
							<div class="hr-line-dashed"></div>
							
							<div class="text-center">
								<div class="btn-group">
									<button class="btn btn-white" type="button"><i class="glyphicon glyphicon-chevron-left"></i></button>
									<button class="btn btn-white">1</button>
									<button class="btn btn-white  active">2</button>
									<button class="btn btn-white">3</button>
									<button class="btn btn-white">4</button>
									<button class="btn btn-white">5</button>
									<button class="btn btn-white">6</button>
									<button class="btn btn-white">7</button>
									<button class="btn btn-white" type="button"><i class="glyphicon glyphicon-chevron-right"></i> </button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
                    