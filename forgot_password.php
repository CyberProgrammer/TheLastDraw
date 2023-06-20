<?php
	session_set_cookie_params(0);
	session_start();
	$status = "Sign In";	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>The Last Draw - Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/forgot_password.css">

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
				<div id="row" class="first-row">
					<h2>We can help</h2>
				</div>
				<?php
                    if(isset($_GET['reset'])){
                    	if($_GET['reset'] == "success"){
                    		echo '<p class="signupsuccess">Check your e-mail!</p>';
                    	}
					}
                ?>
				<div id="row">
					<form id="forgot_form" method="POST" action="php/login/reset_password.php">
                        <label>An email will be sent with instructions to reset your password</label>
                        <input type="text" name="email"></input>
                        <br>
                        <br>
                        <button type="submit" name="reset-password-submit">Create new password</button>
                    </form>


				</div>
				<div id="row">
					
				</div>
			</div>
		</main>
		

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>
	</body>
</html>