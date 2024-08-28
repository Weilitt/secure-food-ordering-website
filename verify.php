<?php
session_start();

require "mail.php";
require 'components/functions.php';
require 'components/connect.php';

check_login();

$errors = array();

// Check if session user_id is set and is an integer
if (isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) {
    if ($_SERVER['REQUEST_METHOD'] == "GET" && !check_verified()) {
        // Generate a verification code and set expiry time
        $vars['code'] = rand(10000, 99999);
        $vars['expires'] = (time() + (60 * 10)); // Expires in 10 minutes

        // Fetch the user's email
        $user = fetch_user_profile($_SESSION['user_id']);
        $vars['email'] = $user['email'];

        // Save the verification code and expiry time to the database
        $query = "INSERT INTO verify (code, expires, email) VALUES (:code, :expires, :email)";
        database_run($query, $vars);

        // Send the verification email
        $message = "Your code is " . $vars['code'];
        $subject = "Email verification";
        $recipient = $vars['email'];
        send_mail($recipient, $subject, $message);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!check_verified()) {
            // Fetch the verification code from the database
            $query = "SELECT * FROM verify WHERE code = :code AND email = :email";
            $vars = array();
            $user = fetch_user_profile($_SESSION['user_id']);
            $vars['email'] = $user['email'];
            $vars['code'] = $_POST['code'];

            $row = database_run($query, $vars);

            if (is_array($row) && count($row) > 0) {
                $row = $row[0];
                $time = time();

                if ($row->expires > $time) {
                    $id = $_SESSION['user_id'];
                    $query = "UPDATE users SET email_verified = email WHERE id = ? LIMIT 1";
                    database_run($query, [$id]);

                    header("Location: profile.php");
                    die;
                } else {
                    $errors[] = "Code expired";
                }
            } else {
                $errors[] = "Wrong code";
            }
        } else {
            $errors[] = "You're already verified";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="verify-container">
    <?php include 'components/user_header.php'; ?>
    <p>An email was sent to your address. Paste the code from the email here:</p>
    <div>
        <?php if (count($errors) > 0): ?>
            <?php foreach ($errors as $error): ?>
                <div class="error"><?= $error ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <form method="post">
        <input type="text" name="code" placeholder="Enter your Code">
        <input type="submit" value="Verify">
    </form>
</div>
<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>
