<?php
	include("php/login/connection.php");
	include("php/login/functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			// read from db
			$query = "select * from users where user_name = '$user_name' limit 1";

			$result = mysqli_query($connect, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					// Verify password
					$verify = password_verify($password, $user_data['passwrd']);

					if($verify){
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}			
				}
			}

			echo "Wrong username or password!";	
		}
		else{
			echo "Wrong username or password2!";
		}
	}
?>