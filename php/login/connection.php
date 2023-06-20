<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "lastdraw";

	if(!$connect = mysqli_connect($host,$username,$password, $db))
	{
		die("failed to connect!");
	}

?>