<?php

include 'components/connect.php';
include 'components/functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Now</span>
               <h3>Flavorful pizza</h3>
               <a href="menu.php" class="btn">see menus</a>
            </div>
            <div class="image">
               <img src="images/home-img-01.png" alt="">
            </div>
         </div>

         
         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/burgerexp4.png" alt="">
            </div>
            <div class="content">
               <span>Order Online</span>
               <h3>chezzy hamburger</h3>
               <a href="menu.php" class="btn">see menus</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Quickly</span>
               <h3>Grilled chicken</h3>
               <a href="menu.php" class="btn">see menus</a>
            </div>
            <div class="image">
               <img src="images/home-img-4.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

<h1 class="title">Cuisine type</h1>

   <div class="box-container">

  <a href="category.php?category=fast food" class="box">
    <img src="images/cat-001.png" alt="Fast Food">
    <h3>Fast Food</h3>
    <p>Quick and delicious meals for on-the-go.</p>
  </a>

  <a href="category.php?category=main dish" class="box">
    <img src="images/cat-002.png" alt="Main Dishes">
    <h3>Main Dishes</h3>
    <p>Hearty and satisfying main courses.</p>
  </a>

  <a href="category.php?category=drinks" class="box">
    <img src="images/cat-003.png" alt="Drinks">
    <h3>Drinks</h3>
    <p>Refreshing beverages to quench your thirst.</p>
  </a>

  <a href="category.php?category=desserts" class="box">
    <img src="images/cat-004.png" alt="Desserts">
    <h3>Desserts</h3>
    <p>Sweet treats to end your meal on a high note.</p>
  </a>

</div>



</section>




<section class="products">

   <h1 class="title">Newest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>RM</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">veiw all</a>
   </div>



   <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .chat-box {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 350px;
            border: none;
            border-radius: 10px;
            background-color: #fff;
            display: none;
            flex-direction: column;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .chat-header {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px 10px 0 0;
            font-size: 16px;
        }

        .chat-header h3 {
            margin: 0;
        }

        .chat-body {
            padding: 15px;
            height: 250px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }

        .chat-footer {
            display: flex;
            border-top: 1px solid #eee;
            padding: 15px;
            background-color: #f1f1f1;
        }

        .chat-footer input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 14px;
        }

        .chat-footer button {
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .chat-footer button:hover {
            background-color: #0056b3;
        }

        .chat-message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 80%;
        }

        .chat-message.bot {
            background-color: #e9f5ff;
            color: #007BFF;
            align-self: flex-start;
        }

        .chat-message.user {
            background-color: #007BFF;
            color: white;
            align-self: flex-end;
        }

        .chat-toggle {
            position: fixed;
            bottom: 80px; /* Adjusted from 20px to 80px */
            right: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .chat-toggle:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-box" id="chat-box">
        <div class="chat-header">
            <h3>Customer Support</h3>
            <button onclick="toggleChatBox()">-</button>
        </div>
        <div class="chat-body" id="chat-body">
            <div class="chat-message bot">Hello! How can I help you today?</div>
        </div>
        <div class="chat-footer">
            <input type="text" id="chat-input" placeholder="Type your message here..." onkeypress="sendMessage(event)">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <button class="chat-toggle" onclick="toggleChatBox()">Chat with Support</button>

    <script src="js/chat_script.js"></script>


</section>


















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>