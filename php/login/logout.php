<?php
	session_set_cookie_params(0);
	session_start();

	if(isset($_SESSION['user_id']))
	{
		unset($_SESSION['user_id']);
	}

	header("Location: ../../index.php");

