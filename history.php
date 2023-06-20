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
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>The Last Draw - History</title>
		<link rel="stylesheet" type="text/css" href="styles/history.css">
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		
		<!-- Pre load -->
		<link rel="preload" href="images/cigars_edit.jpg" as="banner">
		<link rel="preload" href="images/LogoEdit.png" as="logo">
		<link rel="preload" href="images/LogoEdit.png" as="cigars">
		<link rel="preload" href="images/LogoEdit.png" as="cigars2">
		<link rel="preload" href="images/LogoEdit.png" as="cigars3">
	</head>
	
	<body>
		<?php
			include 'common/navigation.php';
		?>


		<!-- Main body -->
		<main>
			<div id="content">
				<div class="row-1">
					<h1 class="hidden">A Look Back</h1>
				</div>
				<div class="content-row">
					<div class="hidden">
						<h1>Vision to Reality</h1>
						<p>
							 With a passion for tobacco and a deep commitment to quality, we poured countless hours into perfecting our craft. Many challenges were met head-on along the way. However, with grit and determination, we overcame these obstacles and transformed our vision into a reality. Day after day, we worked tirelessly, sweating over the details and pouringour heart and soul into every cigar. Slowly but surely, we built a reputation for excellence, becoming a trusted name in the industry. Today, we carry on upholding our commitment to quality and passion for cigars in every cigar we make.
						</p>
						<img src="images/history/shop.webp" alt="shop">
					</div>
				</div>
				<div class="content-row">
					<div class="hidden">
						<h1>Birth of a Legacy</h1>
						<p>
							In the heart of the Dominican Republic, we dreamed of creating the perfect cigar. We began studying the art of cigar-making with the help of a skilled tobacco farmer and cigar roller. We spent long hours in the fields, learning to harvest and cure the tobacco leaves until they were perfect for rolling. Word of our talent spread, and soon, cigar aficionados from around the world were seeking out our cigars. They marveled at the complexity of the flavors, the richness of the tobacco, and the expert craftsmanship that went into each cigar. As demand for his products grew, we realized that we had the potential to create something truly special.
						</p>
						<img src="images/history/fire.webp" alt="passion_burning">
					</div>
				</div>
				<div class="content-row">
					<div class="hidden">
						<h1>Dodging Obstacles</h1>
						<p>
							One of the biggest challenges we faced was sourcing the right tobacco leaves. The climate in the Dominican Republic could be harsh and unpredictable, making it difficult to grow tobacco that was of a consistently high quality. Another major obstacle was the competition. The cigar industry was dominated by established brands with deep pockets, and it was tough for us to break into the market. We had to find ways to differentiate our products from the others and find a loyal customer base that appreciated the unique flavor of our cigars. It was a long and hard-fought battle, but eventually, word of mouth about our exceptional cigars began to spread. We worked tirelessly to perfect our blends and never compromised on quality, no matter what obstacles we faced.
						</p>
						<img src="images/history/shop.webp" alt="shop">
					</div>
				</div>
				<div class="content-row">
					<div class="hidden">
						<h1>Preserving a Tradition</h1>
						<p>
							We believe that the art of cigar-making is a sacred one, and it is our responsibility to honor and maintain the legacy of those who came before us. Our cigars are crafted using time-honored techniques, from the way we grow and harvest our tobacco to the way we hand-roll and age each cigar. We believe that there is a certain magic in the way that cigars are made, and we are committed to preserving that magic for generations to come.
						</p>
						<img src="images/history/fire.webp" alt="passion_burning">
					</div>
				</div>
			</div>
		</main>

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>

		<script src="scripts/scrollEffects.js"></script>
	</body>

</html>