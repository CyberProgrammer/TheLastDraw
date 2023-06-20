<?php
	// Get the values from the form or any other source
	$newFirstName = $_POST['first_name'];
	$newLastName = $_POST['last_name'];
	$newEmail = $_POST['email'];
	$newPhone = $_POST['phone'];
	$email = $user_data['email'];

	if (!empty($newFirstName) && !empty($newLastName) && !empty($newEmail) && !empty($newPhone) && !empty($email) && !is_numeric($newFirstName) && !is_numeric($newLastName)) {
	    if (strlen($newPhone) == 10) {
	        // Prepare the SQL statement with placeholders
	        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone_number = ? WHERE email = ?";

	        // Prepare the statement
	        $stmt = $connect->prepare($sql);

	        if ($stmt) {
	            // Bind the parameters
	            $stmt->bind_param("sssss", $newFirstName, $newLastName, $newEmail, $newPhone, $email);

	            // Execute the statement
	            if ($stmt->execute()) {
	                echo "<p  style='width: 100%; text-align: center; color:green;'>Update successful!</p>";
	                // Update $user_data session variable
                	$user_data['first_name'] = $newFirstName;
                	$user_data['last_name'] = $newLastName;
                	$user_data['email'] = $newEmail;
                	$user_data['phone_number'] = $newPhone;
	            } else {
	                echo "<p style='width: 100%; text-align: center; color:red;'>Update failed!</p>";
	            }

	            // Close the statement
	            $stmt->close();
	        } else {
	            echo "<p>Statement preparation failed!</p>";
	        }
	    } else {
	        echo "<p style='width: 100%; text-align: center; color:red;'>Phone number is not valid!</p>";
	    }
	} else {
	    echo "<p  style='width: 100%; text-align: center; color:red;' >Data is not valid!</p>";
	}
?>


<div class='details_label_row'>
	<label>First Name</label>
	<label>Last Name</label>
</div>

<div class='details_input_row'>
	<input type='textbox' name='first_name' value='<?php echo $user_data['first_name']; ?>' disabled>
	<input type='textbox' name='last_name' value='<?php echo $user_data['last_name']; ?>' disabled>
</div>

<div class='details_label_row'>
	<label>Email Address</label>
	<label>Phone Number</label>
</div>

<div class='details_input_row'>
	<input type='textbox' name='email' value='<?php echo $user_data['email']; ?>' disabled>
	<input type='textbox' name='phone' value='<?php echo $user_data['phone_number']; ?>' disabled>
</div>

<div class='detail_buttons'>
	<button type="submit" name="edit_profile" class="accountBtn">Edit</button>
	<button type="submit" name="save_profile" class="accountBtn" disabled>Save</button>
</div>