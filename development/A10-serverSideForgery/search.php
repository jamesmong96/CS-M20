<?php

	// set the timeout for the search result
	ini_set('default_socket_timeout', 5);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// log post body
		error_log('"'.str_replace("/var/www/html", "", __FILE__).'" "GET" "'.http_build_query($_POST).'"');

		$url = $_POST["url"];

		// check if protocol is included in the url
		if (strpos($url, "://") == FALSE){
			$url = "http://".$url;
		}

		// get the content from the url
		$result = htmlspecialchars(file_get_contents($url));
		// file:///var/www/html/A10-serverSideForgery/database_credential

	}
	
?>
<html>
    <head>
        <title>A10 - Search</title>
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
					<p style="color: #6c757d!important;">This is the URL scraping console developed by Random Company. You can browse all the websites you want without exposing your network information.</p>
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
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Scrape</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
					<strong>URL scraping Console</strong>
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
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										if ($result == FALSE) {
											echo "No content found from <strong>".htmlspecialchars($url)."</strong>";
										} else {
											echo "Content return from <strong>".htmlspecialchars($url)."</strong>" ;
										}
									} else {
										echo "Enter the brand and start your search";
									}
								?>
							</h2>
							<small>
								<?php 
									if ($_SERVER["REQUEST_METHOD"] == "POST" && $result != FALSE) {
										echo "Request time  (0.".rand(0, 99)." seconds)";
									}
								?>
							</small>
				
							<div class="search-form">
								<form action="./search.php" method="post">
									<div class="input-group">
										<input type="text" placeholder="URL" name="url" class="form-control input-lg">
										<div class="input-group-btn">
											<button class="btn btn-lg btn-primary" type="submit">
												Scrape
											</button>
										</div>
									</div>
								</form>
							</div>

							<?php
								if ($_SERVER["REQUEST_METHOD"] == "POST" && $result != FALSE) {
									echo '<div class="hr-line-dashed"></div>';
									echo '<div class="search-result">';
									echo '	<code>'.$result.'</code>';
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
                    