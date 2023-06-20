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
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/catalog.css">
		<title>The Last Draw - Catalog</title>
	</head>

	<body>
		<?php
			include 'common/navigation.php';
		?>

		<!-- Main body -->
		<main>
			<div id="content">
				<div class="row">
					<h1>Catalog</h1>
				</div>
				<div class="row">
					<?php
						include 'php/products/desktop.php';
					?>
				</div>
				<div class="content_mobile">
					<?php
						include 'php/products/mobile.php';
					?>
				</div>
			</div>
		</main>
		

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>
	</body>
</html>