<?php
	session_set_cookie_params(0);
	session_start();

	include("php/login/connection.php");
	include("php/login/functions.php");

	$user_data = check_login($connect);

	if($user_data){
		$status = "Account" ;
	}
	else{
		$status = "Sign In";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/navigation.css">
		<link rel="stylesheet" type="text/css" href="styles/account.css">
		
	</head>

	<body>
		<?php
			include 'common/navigation.php';
		?>
		

		<!-- Main body -->
		<main>
			<div id="content">
				<form action="php/account/upload_image.php" method="POST" enctype="multipart/form-data">
					<div class="row-account">
					    <h1>Account Details</h1>
					    <div class="image">
						  <?php
						  	include 'php/account/load_image.php';
						  ?>
						  <input type="file" name="changeImg" id="changeImageBtn" class="upload" value="Change Image" onchange="loadFile(event)">
						  <input type="submit" value="Save Image" class="save_image">
						  	<?php
						  		if (isset($_GET['upload'])) {
								    $uploadStatus = $_GET['upload'];
								    if ($uploadStatus == 'true') {
								        echo "<h5 style='color: green;'>File uploaded successfully!</h5>";
								    } else if ($uploadStatus == 'false') {
								        echo "<h5 style='color: red;'>File upload failed!</h5>";
								    }
								}
							?>
						</div>
						

					</div>
				</form>

				<div class="row">
					
				</div>

				<div class='account_details'>
					<form id='details_form' method='post'>
						<?php
							if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					            if (isset($_POST['edit_profile'])) {
					                include 'php/account/edit_details.php';
					            }

					            if (isset($_POST['save_profile'])) {
					                include 'php/account/save_details.php';
					            }
					        } else {
					            include 'php/account/details.php';
					        }
						?>
					</form>
				</div>
				

				<div class="row contact-history">
				    <h1>Contact History</h1>
				    <div class="selection">
				        <button type="button" id='sales' value='sales'>Sales</button>
				        <button type="button" id='product' value='product'>Product</button>
				        <button type="button" id='other' value='other'>Other</button>
				    </div>
				    <div id="contact-container" class="db"></div>
				</div>

				
				<div class="logout_row">
					<form method="post" action="php/login/logout.php">
				        <input type="submit" name="Log Out" value="Log Out"/>
				    </form>
				</div>
			</div>
		</main>
		
		<!-- Footer -->
		<?php
			include 'common/footer.php';
		?>

		<?php 
			if ($user_data){
				echo "<script src='scripts/accountContact.js'></script>";
			}
		?>
		
	</body>
	<script type="text/javascript">
		var loadFile = function(event) {
		  var file = event.target.files[0];

		  if (file) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      var img = document.getElementById('output');
		      img.src = e.target.result;
		    };
		    reader.readAsDataURL(file);
		  }
		};
	</script>
</html>