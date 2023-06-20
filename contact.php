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
		<title>The Last Draw - Contact</title>
		<link rel="stylesheet" type="text/css" href="styles/contact.css">
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">

		<!-- Pre load -->
		<link rel="preload" href="images/cigars_edit.jpg" as="banner">
		<link rel="preload" href="images/LogoEdit.png" as="logo">
	</head>
	
	<body>
		<?php
			include 'common/navigation.php';
		?>

		<!-- Main body -->
		<main>
			<div id="content">
				<div id="contact-form" class="row">
					<h3 class="content-title">What would you like to talk about?</h3>
					<?php
						if(isset($_GET['connect'])){
							if($_GET['connect'] == true){
								echo "<h4 class='connect-true'>Message sent. We will get back to you as soon as possible!</h4>";
							}
							else{
								echo "<h4 class='connect-false'>Message not sent. Connection failed!</h4>";
							}
						}
					?>

					<?php 
						include 'php/contact_buttons.php';
					?>
					
					<div id="contact-form-container" class="row">
						
					</div>
					<!--
					<form>
						<label>First Name:</label>
						<input type="text" name="first_name_input">

						<label>Last Name:</label>
						<input type="text" name="last_name_input">
					</form>
					-->
				</div>
			</div>
		</main>

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>
	</body>
	<script src="scripts/contactPage.js"></script>
</html>