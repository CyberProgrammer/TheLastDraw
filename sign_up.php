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
		<title>The Last Draw - Sign Up</title>
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/sign_up.css">

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
					<h2>Sign Up</h2>
					<p>Please fill out all required information</p>
				</div>
				<div id="row">
					<?php
						include 'php/login/signup_check.php';
					?>
					
					<form id="signup_form" method="POST">
                        <label>First Name:</label>
                        <input type="text" name="first_name" required></input>

                        <label>Last Name:</label>
                        <input type="text" name="last_name" required></input>

                        <label>Username:</label>
                        <input type="text" name="user_name" required></input>

                        <label for="first_name">Password:</label>
                        <input class="textbox" type="text" id="password" name="password" required>

                        <label for="phone_number">Phone Number:</label>
                        <input class="textbox" type="text" id="phone_number" name="phone_number" required>

                        <label for="email">Email Address:</label>
                        <input class="textbox" type="text" id="email" name="email" required>

                        <button type="submit">Submit</button>
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