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
		<title>The Last Draw - Create new password</title>
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/create_password.css">

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
				<?php
					$selector = $_GET['selector'];
					$validator = $_GET['validator'];

					// Check if tokens exists
					if(empty($selector) || empty($validator)){
						echo "Could not validate your request!";
					}
					else{
						if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
							?>
								<form id="new_password_form" method="POST" action="php/login/change_password.php">
									<input type="hidden" name="selector" value="<?php echo $selector ?>">
									<input type="hidden" name="validator" value="<?php echo $validator ?>">

			                        <label>Enter new password:</label>
			                        <input type="text" name="password"></input>
			                        <br>
			                        <label>Confirm new password:</label>
			                        <input type="text" name="confirm_password"></input>
			                        <br>
			                        <br>
			                        <button type="submit" name="reset-password-submit">Change Password</button>
			                    </form>
										

							<?php
						}
						else{
							header("Location: forgot_password.php");
							die;
						}
					}
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