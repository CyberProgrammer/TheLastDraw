<?php
session_start();

if(isset($_POST['reset-password-submit'])){

	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = $_POST['password'];
	$password_confirm = $_POST['confirm_password'];

	if(empty($selector) || empty($validator) || empty($password) || empty($password_confirm)){
		header("Location: ../../forgot_password.php?newpwd=empty");
		exit();
	}
	else if($password != $password_confirm){
		header("Location: ../../forgot_password.php?newpwd=pwdnotsame");
		exit();
	}

	$currentDate = date("U");
	require 'connection.php';

	$sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
	$stmt = mysqli_stmt_init($connect);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "There was an error!";
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)){
			echo "You need to re-submit your reset request.";
			exit();
		} else{
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

			if($tokenCheck === false){
				echo "You need to re-submit your reset request.";
				exit();
			} else if($tokenCheck === true){
				$tokenEmail = $row['pwdResetEmail'];

				$sql = "SELECT * FROM users WHERE email=?;";
				$stmt = mysqli_stmt_init($connect);

				if(!mysqli_stmt_prepare($stmt,$sql)){
					echo "There was an error!";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
					mysqli_stmt_execute($stmt);

					$result = mysqli_stmt_get_result($stmt);
					if(!$row = mysqli_fetch_assoc($result)){
						echo "There was an error!";
						exit();
					}else{

						$sql = "UPDATE users SET passwrd=? WHERE email=?;";
						$stmt = mysqli_stmt_init($connect);

						if(!mysqli_stmt_prepare($stmt,$sql)){
							echo "There was an error!";
							exit();
						}else{
							// Hash password
							$newPwdHash = password_hash($password_confirm, PASSWORD_DEFAULT);

							mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
							mysqli_stmt_execute($stmt);

							$sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
							$stmt = mysqli_stmt_init($connect);
							if(!mysqli_stmt_prepare($stmt, $sql)){
								echo "There was an error!";
								exit();
							}
							else{
								mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
								mysqli_stmt_execute($stmt);
								header("Location: ../../login_page.php?newpwd=passwordupdated");

							}
						}
					}
				}
			}
		}
	}
	
}	
else{
	header("Location: ../../forgot_password.php");
	exit();
}





