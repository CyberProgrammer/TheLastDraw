<?php
	session_set_cookie_params(0);
	session_start();

	include("php/login/connection.php");
	include("php/login/functions.php");

	$user_data = check_login($connect);

	if($user_data){
		$status = "Account" ;
	}
	else{
		$status = "Sign In";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>The Last Draw - Cigars</title>
		<link rel="stylesheet" type="text/css" href="styles/cigars.css">
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">

		<!-- Pre load -->
		<link rel="preload" href="images/cigars_edit.jpg" as="banner">
		<link rel="preload" href="images/LogoEdit.png" as="logo">
		<link rel="preload" href="images/products/imperial_heritage.jpg" as="product1">
		<link rel="preload" href="images/products/platinum_priviledge.jpg" as="product2">
		<link rel="preload" href="images/products/royal_reserva.jpg" as="product3">
		<link rel="preload" href="images/products/sovereign_select.jpg" as="product4">
	</head>
	
	<body>
		<?php
			include 'common/navigation.php';
		?>
		

		<!-- Main body -->
		<main>
			<div id="content">
				<div class="row-1">
					<h1>Our Collection</h1>
					<p>
						Carefully curated to satisfy the most discerning cigar aficionado. From the rich and bold to the smooth and mellow, our selection features some of the world's finest cigars, sourced from renowned tobacco regions across the globe.
					</p>
				</div>

				<div id="product-royal-reserva" class="cigar-row">
					<div class="cigar-row-content">
						<ul class="list-row">
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<polyline points="19 12 12 19 5 12"></polyline>
								</svg>
							</li>
							<li><h4>Royal Reserva</h4></li>
						</ul>
					</div>
				</div>
				<div id="product-platinum-privilege" class="cigar-row">
					<div class="cigar-row-content">
						<ul class="list-row">
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<polyline points="19 12 12 19 5 12"></polyline>
								</svg>
							</li>
							<li><h4>Platinum Privilege</h4></li>
						</ul>
						
					</div>
				</div>
				<div id="product-imperial-heritage" class="cigar-row">
					<div class="cigar-row-content">
						<ul class="list-row">
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<polyline points="19 12 12 19 5 12"></polyline>
								</svg>
							</li>
							<li><h4>Imperial Heritage</h4></li>
						</ul>
					</div>
				</div>
				<div id="product-sovereign-select" class="cigar-row-last">
					<div class="cigar-row-content">
						<ul class="list-row">
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<polyline points="19 12 12 19 5 12"></polyline>
								</svg>
							</li>
							<li><h4>Sovereign Select</h4></li>
						</ul>
					</div>
				</div>

				<div class="row-1">
					<a href="catalog.php" id="view_catalog" name="view_catalog" class="viewcatalog">View Catalog</a>
				</div>
			</div>
		</main>
		

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>
	</body>

</html>