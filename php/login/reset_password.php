<?php
session_start();

// Check if a user enters the page properly
if(isset($_POST['reset-password-submit']))
{
	// Creates random binary and converts to hex
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	// Create link to create a new password with tokens included
	$url = "http://localhost/cigar/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);

	// Create expiration date for token in 15min = 450 seconds
	$expires = date("U") + 450;

	// Connect to db
	require 'connection.php';

	$userEmail = $_POST['email'];

	// Delete any existing tokens before proceeding
	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
	$stmt = mysqli_stmt_init($connect);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "There was an error!";
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);
	}

	// Insert into db
	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

	$stmt = mysqli_stmt_init($connect);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "There was an error!";
		exit();
	}
	else{
		//Hash token
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($connect);

	// Send email
	$to = $userEmail;

	$subject = 'Reset your password here';

	$message = '<p>We received a password reset request. If you did not make this request to reset your password you can ignore this.</p>';

	$message .= '<p>Here is your password reset link: <br>';
	$message .= '<a href="'. $url . '">' . $url . '</a></p>';

	$headers = "From: LastDraw <thelastdraw@gmail.com>\r\n";
	$headers .= "Reply-To: thelastdraw@gmail.com\r\n";
	$headers .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);

	header("Location: ../../forgot_password.php?reset=success");
}
else{
	header("Location: ../../forgot_password.php?reset=fail");
}
