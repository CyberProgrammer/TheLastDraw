<?php
	// Query to retrieve data from the "Cigars" table
	$query = "SELECT * FROM products";

	// Execute the query
	$result = mysqli_query($connect, $query);

	// Check if the query was successful
	if ($result) {
	    // Check if there are any rows returned
	    if (mysqli_num_rows($result) > 0) {
	    	$message = '<div class="product_row_desktop">';
	    	$count = 0;

	        // Loop through each row and retrieve the data
	        while ($row = mysqli_fetch_assoc($result)) {
	            $name = $row['name'];
	            $wrapper = $row['wrapper'];
	            $strength = $row['strength'];
	            $price = $row['price'];
	            $stock = $row['stock'];

	            if($count == 3){
	            	$message = $message . '</div>';
	            	$message = $message . '<div class="product_row_desktop">';
	            	$count = 0;
	            }

	            $message = $message .  '<div class="product">
									        <h3>'. $name .'</h3>
									        <img src="images/products/default_product.png">
									        <div class="product_details">
									        	<p>$'. $price .'</p>
									        </div>
									    </div>
									    ';

				$count = $count + 1;
	        }
	    } else {
	        echo "No records found in the table.";
	    }

	    // Free the result set
	    mysqli_free_result($result);
	} else {
	    echo "Error executing the query: " . mysqli_error($connect);
	}

	if($count != 0){
		$message = $message . '</div>';
	}
	
	echo $message;


	// Close the database connection
	mysqli_close($connect);
