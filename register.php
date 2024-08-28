<?php

include 'components/connect.php';
include 'components/functions.php';

// Check if a session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'number' => $_POST['number'],
        'pass' => $_POST['pass'],
        'cpass' => $_POST['cpass']
    ];

    $errors = signup($data);

    if (!empty($errors)) {
        foreach ($errors as $error) {
            $message[] = $error;
        }
    } else {
        $message[] = "Registration successful! Please log in.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Header section starts -->
<?php include 'components/user_header.php'; ?>
<!-- Header section ends -->

<section class="form-container">

    <form action="" method="post">
        <h3>Register Now</h3>
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<p class="message">'.$msg.'</p>';
            }
        }
        ?>
        <input type="text" name="name" required placeholder="Enter your name" class="box" maxlength="50">
        <input type="email" name="email" required placeholder="Enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="number" name="number" required placeholder="Enter your number" class="box" min="0" max="9999999999" maxlength="10">
        <input type="password" name="pass" required placeholder="Enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="cpass" required placeholder="Confirm your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="submit" value="Register Now" name="submit" class="btn">
        <p>Already have an account? <a href="login.php">Login now</a></p>
    </form>

</section>

<?php include 'components/footer.php'; ?>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
