<?php
	include("login/connection.php");

	$bool = true;

	if ($connect->connect_error) {
		$bool = false;
    	die("Connection failed: " .$connect->connect_error);
	}

	date_default_timezone_set('America/New_York');
	$current_date = date('Y-m-d H:i:s');

	// Sending form data to sql db.
	$stmt = $connect->prepare("INSERT INTO contact_product (product_num, first_name, last_name, email_address, subject, user_message, received_date)
	VALUES (?, ?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("sssssss", $product_num, $first_name, $last_name, $email_address, $subject, $user_message, $current_date);

	// Set values
	$product_num = $_POST['product_num'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email_address = $_POST['email_address'];
	$subject = $_POST['subject'];
	$user_message = $_POST['user_message'];

	$stmt->execute();
	$stmt->close();

	header("Location: ../contact.php?connect=" . $bool);
?>