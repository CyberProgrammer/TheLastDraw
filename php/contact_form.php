<?php
  if (isset($_GET['type'])) {
    $supportType = $_GET['type'];
    switch ($supportType) {
      case 'sales':
        // Load technical support form HTML
        $formHtml ='<h3>Sales Contact Form</h3>
                    <form id="sales_form" method="POST" action="php/get_sales_form.php">
                        <label>Order Number:</label>
                        <input type="text" name="order_num" required></input>

                        <label for="first_name">First Name:</label>
                        <input class="textbox" type="text" id="first_name" name="first_name" required>

                        <label for="last_name">Last Name:</label> 
                        <input class="textbox" type="text" id="last_name" name="last_name" required>

                        <label for="email_address">Email:</label> 
                        <input class="textbox" type="text" id="email_address" name="email_address" required>

                        <label>Subject:</label>
                        <input type="text" name="subject" required></input>
                        
                        <label for="user_message">What would you like to discuss?</label> 
                        <textarea type="text" id="user_message" name="user_message" maxlength="150" required></textarea>

                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </form>';
        break;
      case 'product':
        // Load sales support form HTML
        $formHtml ='<h3>Product Contact Form</h3>
                    <form id="product_form" method="POST" action="php/get_product_form.php">
                        <label>Product Number:</label>
                        <input type="text" name="product_num" required></input>

                        <label for="first_name">First Name:</label>
                        <input class="textbox" type="text" id="first_name" name="first_name" required>

                        <label for="last_name">Last Name:</label> 
                        <input class="textbox" type="text" id="last_name" name="last_name" required>

                        <label for="email_address">Email:</label> 
                        <input class="textbox" type="text" id="email_address" name="email_address" required>

                        <label>Subject:</label>
                        <input type="text" name="subject" required></input>

                        <label for="user_message">What would you like to discuss?</label> 
                        <textarea type="text" id="user_message" name="user_message" maxlength="150" required></textarea>

                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </form>';
        break;
      case 'other':
        // Load general support form HTML
        $formHtml ='<h3>Other Contact Form</h3>
                    <form id="other_form" method="POST" action="php/get_other_form.php">
                        <label for="first_name">First Name:</label>
                        <input class="textbox" type="text" id="first_name" name="first_name" required>

                        <label for="last_name">Last Name:</label> 
                        <input class="textbox" type="text" id="last_name" name="last_name" required>

                        <label for="email_address">Email:</label> 
                        <input class="textbox" type="text" id="email_address" name="email_address" required>

                        <label>Subject:</label>
                        <input type="text" name="subject" required></input>

                        <label for="user_message">What would you like to discuss?</label> 
                        <textarea type="text" id="user_message" name="user_message" maxlength="150" required></textarea>

                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </form>';
        break;
      default:
        $formHtml = '<p>Invalid support type selected.</p>';
    }
    echo $formHtml;
  }
?>