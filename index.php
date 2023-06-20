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
		<title>The Last Draw - Home</title>
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/home.css">
	</head>

	<body>
		<?php
			include 'common/navigation.php';
		?>
		

		<!-- Main body -->
		<main>
			<div id="content">
				<div class="row-1">
					<h1>Elevate your experience</h1>
					<p>
						We are pleased to present to you our exquisite collection of premium cigars, which have been thoughtfully crafted to provide a superior smoking experience. Our cigars come in a variety of flavors, from bold and robust to smooth and refined, and are made using only the finest tobacco available. We take pride in delivering high-quality cigars that are sure to satisfy even the most discerning taste.
					</p>
					<img src="images/cigars2.jpg" alt="cigar">
				</div>
				<div class="row-2">
					<h1>Lasting satisfaction</h1>
					<p>
						Our cigars are crafted to ensure a smooth and satisfying smoking experience from start to finish. Whether you are a seasoned aficionado or new to the world of cigars, we are confident that our cigars will provide you with the lasting satisfaction you crave.
					</p>
					<img src="images/cigars5.jpg" alt="cigars">
				</div>
				<div class="row-3">
					<h1>Hard work in every draw</h1>
					<p>
						We celebrate the hard work that goes into every draw of our premium cigars. We believe that a great cigar is the result of expert craftsmanship and a commitment to using only the finest ingredients. That's why we take great pride in offering a selection of cigars that are carefully crafted to deliver a smooth and enjoyable smoking experience.
					</p>
					<img src="images/cigars4.jpg" alt="cigar">
				</div>
			</div>
		</main>
		

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>
	</body>
</html>