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

	// prepare the required statement
	$stmt = "SELECT * from products WHERE brand=?;";
	
	// check the login credential from database
	parse_str($_GET["search"]); // expected brand=xxx

	// payload
	// search=brand%3D123%26stmt%3DSELECT%20*%20from%20products%20where%201%3D1%20or%20brand%3D%3F%3B
	
	if (isset($brand) && $brand != "") {
		$sql = $conn->prepare($stmt);
		$sql->bind_param("s", $brand);
		$sql->execute();
		$result = $sql->get_result();
		$sql->close();
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
		<script>
			function formatQuery() {
				document.getElementsByTagName('form')[0].search.value = "brand=" + document.getElementsByTagName('form')[0].search.value;
  				return true;
			}
		</script>
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
				<a href="./search.php" class="navbar-brand d-flex align-items-center">
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
								<?php 
									if (isset($result)) {
										echo strval($result->num_rows)." results found for: <strong>".htmlspecialchars($brand)."</strong>" ;
									} else {
										echo "Enter the brand and start your search";
									}
								?>
							</h2>
							<small>
								<?php 
									if (isset($result)) {
										echo "Request time  (0.".rand(0, 99)." seconds)";
									}
								?>
							</small>
				
							<div class="search-form">
								<form action="#" method="get" onsubmit="formatQuery();">
									<div class="input-group">
										<input type="text" placeholder="Brand" name="search" class="form-control input-lg">
										<div class="input-group-btn">
											<button class="btn btn-lg btn-primary" type="submit">
												Search
											</button>
										</div>
									</div>
								</form>
							</div>

							<?php
								while($row = $result->fetch_assoc()) {
									echo '<div class="hr-line-dashed"></div>';
									echo '<div class="search-result">';
									echo '	<h3><a href="#">'.$row["name"].'</a></h3>';
									echo '	<a href="#" class="search-link">'.$row["url"].'</a>';
									echo '	<p>'.$row["description"].'</p>';
									echo '</div>';
								}
							?>
							<div class="hr-line-dashed"></div>
							
							<div class="text-center">
								<div class="btn-group">
									<button class="btn btn-white active">1</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
                    