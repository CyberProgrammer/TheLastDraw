<div class='details_label_row'>
	<label>First Name</label>
	<label>Last Name</label>
</div>

<div class='details_input_row'>
	<input type='textbox' name='first_name' value='<?php echo $user_data['first_name']; ?>'>
	<input type='textbox' name='last_name' value='<?php echo $user_data['last_name']; ?>'>
</div>

<div class='details_label_row'>
	<label>Email Address</label>
	<label>Phone Number</label>
</div>

<div class='details_input_row'>
	<input type='textbox' name='email' value='<?php echo $user_data['email']; ?>'>
	<input type='textbox' name='phone' value='<?php echo $user_data['phone_number']; ?>'>
</div>

<div class='detail_buttons'>
	<button type="submit" name="edit_profile" class="accountBtn">Edit</button>
	<button type="submit" name="save_profile" class="accountBtn">Save</button>
</div>