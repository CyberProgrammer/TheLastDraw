<?php
	// Example SQL query to update the image path in the database
	$query = "SELECT profile_picture FROM users WHERE user_id = " . $user_data['user_id'];
	$result = mysqli_query($connect, $query);

	$prefixPath = "php/account/";
	while ($row = mysqli_fetch_assoc($result)) {
		if($row['profile_picture'] != NULL){
			$imagePath = $prefixPath . $row['profile_picture'];
		} else{
			$imagePath = $prefixPath . "images/blank-profile-picture.png";
		}
	}
?>


<img class="profile" src="<?php echo $imagePath; ?>" id="output">