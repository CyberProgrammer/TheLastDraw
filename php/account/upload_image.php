<?php
	session_start();

	include("../login/connection.php");
	include("../login/functions.php");

	$user_data = check_login($connect);

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["changeImg"])) {
	    $file = $_FILES["changeImg"];

	    // Move the uploaded file to a desired location
	    $targetDirectory = "images/";
	    $targetFile = $targetDirectory . $user_data['user_id'];
	    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
	        // File uploaded successfully
	        // Check if user has image saved already and delete it
	        $query = "SELECT profile_picture FROM users WHERE user_id = " . $user_data['user_id'];
	        $result = mysqli_query($connect, $query);

	        if ($result && mysqli_num_rows($result) > 0) {
	            $row = mysqli_fetch_assoc($result);
	            if ($row['profile_picture'] != NULL && $row['profile_picture'] != $targetFile) {
	                $fileToDelete = "" . $row['profile_picture']; // Add the appropriate directory path
	                if (file_exists($fileToDelete)) {
	                    unlink($fileToDelete);
	                }
	            }
	        }

	        // Update the user's image path in the database
	        $imagePath = $targetFile; // or store the relative path in the database
	        // Perform the database update here

	        // Example SQL query to update the image path in the database
	        $query = "UPDATE users SET profile_picture = '$imagePath' WHERE user_id = " . $user_data['user_id'];
	        mysqli_query($connect, $query);

	        header("Location: ../../account.php?upload=true");

	    } else {
	        header("Location: ../../account.php?upload=false");
	    }
	} else {
	    header("Location: ../../account.php?upload=false");
	}
?>
