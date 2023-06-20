<?php
	// File makes sure that db does not have an existing user with a matching email. If it passes, account is uploaded to db

	include("php/login/connection.php");
	$bool = true;

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];


		if(!empty($username) && !empty($password) && !empty($email) && !empty($first_name) && !empty($last_name) && !empty($phone_number) && !is_numeric($username) && !is_numeric($first_name) && !is_numeric($last_name))
		{
			if(strlen($phone_number) == 10){
				$sql = "SELECT * FROM users WHERE email=?";
				$stmt = mysqli_stmt_init($connect);

				if(!mysqli_stmt_prepare($stmt,$sql)){
					$bool = false;
					echo "There was an error!";
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt, "s", $email);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
				}
				
				if(!$row = mysqli_fetch_assoc($result)){
					// Hash password
					$newPwdHash = password_hash($password, PASSWORD_DEFAULT);

					// Create prepared statement
					$user_id = random_num(20);
					
					$stmt = $connect->prepare("INSERT INTO users (user_id, first_name, last_name, user_name, passwrd, email, phone_number) values (?, ?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("sssssss", $user_id, $first_name, $last_name, $user_name, $newPwdHash, $email, $phone_number);

					$stmt->execute();
					$stmt->close();

					header("Location: login_page.php?create_account=" . $bool);
					die;
				}
				else{
					echo "<p class='sign_up_error'>An account is already created under this email!</p>";
				}
			}
			else{
				echo "<p class='sign_up_error'>Phone number is not 10 digits!</p>";
			}
		}
		else{
			echo "Wrong username or password!";
		}
	}