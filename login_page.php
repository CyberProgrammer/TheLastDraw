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
		<title>The Last Draw - Login / Sign Up</title>
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/login_page.css">

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
					<h2>Become a part of tradition</h2>
				</div>
				<div id="row">
					<form id="login_form" method="POST">
						<?php
		                    if(isset($_GET["newpwd"])){
		                    	if($_GET["newpwd"] == "passwordupdated"){
		                    		echo '<p class="sign_up_success">Your password has been reset!</p>';
		                    	}
							}

							if(isset($_GET["create_account"])){
								if($_GET["create_account"] == true){
									echo '<p class="sign_up_success">Your account has been created!</p>';
								}
							}
               			?>
                        <label>Username:</label>
                        <input type="text" name="user_name" required></input>

                        <label for="first_name">Password:</label>
                        <input class="textbox" type="password" id="password" name="password" required>

                        <a href="forgot_password.php">Forgot Password</a>
                        <a href="sign_up.php">Create Account</a>
                        <br>
                        <span class="php_login_row">
                        	<?php
                        		include 'php/login/login_check.php';
                        	?>
                        </span>
                        
                        <br>
                        <button type="submit" name="send-login-submit">Submit</button>
                    </form>
				</div>
			</div>
		</main>
		

		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>
	</body>
</html>