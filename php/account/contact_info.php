<?php
    session_start();

    include("../login/connection.php");
    include("../login/functions.php");

    $user_data = check_login($connect);

    if (isset($_GET['type'])) {
        $supportType = $_GET['type'];
        switch ($supportType) {
            case 'sales':
                $table = 'contact_sales';
                $errorMsg = 'You have not made any sales contact requests.';
                break;
            case 'product':
                $table = 'contact_product';
                $errorMsg = 'You have not made any product contact requests.';
                break;
            case 'other':
                $table = 'contact_other';
                $errorMsg = 'You have not made any contact requests.';
                break;
            default:
                $formHtml = '<p>Invalid support type selected.</p>';
                echo $formHtml;
                exit();
        }

        $email = $user_data['email'];

        $sql = "SELECT * FROM $table WHERE email_address=?";
        $stmt = mysqli_stmt_init($connect);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }

        $message = "<table><tr><th class='col-1'>Subject</th><th class='col-2'>Message</th><th class='col-3'>Received Date</th></tr>";

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $message .= "<tr>";
                $message .= "<td> {$row['subject']}</td>";
                $message .= "<td> {$row['user_message']} </td>";
                $message .= "<td> {$row['received_date']} </td>";
                $message .= "</tr>";
            }

            $message .= "</table>";
        } else {
            echo "<br><br><br>$errorMsg";
            exit();
        }

        $formHtml = $message;
        echo $formHtml;
    }
?>
