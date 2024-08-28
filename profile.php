<?php

include 'components/connect.php';
include 'components/functions.php';

// Check if the user is logged in
check_login();

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location:home.php');
    exit;
}

// Fetch user profile data
$fetch_profile = fetch_user_profile($user_id);

// Check if the user is verified
$is_verified = check_verified();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- Header section starts -->
<?php include 'components/user_header.php'; ?>
<!-- Header section ends -->

<section class="user-details">
   <div class="user">
      <img src="images/user-icon.png" alt="User Icon">
      <p><i class="fas fa-user"></i><span><?= htmlspecialchars($fetch_profile['name']); ?></span></p>
      <p><i class="fas fa-phone"></i><span><?= htmlspecialchars($fetch_profile['number']); ?></span></p>
      <p><i class="fas fa-envelope"></i><span><?= htmlspecialchars($fetch_profile['email']); ?></span></p>
      <a href="update_profile.php" class="btn">Update Info</a>
      <p class="address"><i class="fas fa-map-marker-alt"></i><span><?= htmlspecialchars($fetch_profile['address'] ? $fetch_profile['address'] : 'Please enter your address'); ?></span></p>
      <a href="update_address.php" class="btn">Update Address</a>

      <?php if (!$is_verified): ?>
         <a href="verify.php" class="btn verify-btn"><i class="fa fa-id-card"></i> Verify Now</a>
      <?php else: ?>
         <p class="success">Verified successfully</p>
      <?php endif; ?>
   </div>
</section>



<?php include 'components/footer.php'; ?>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
