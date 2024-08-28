<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>about us</h3>
   <p><a href="home.php">home</a> <span> / about</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img01.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Our online food ordering platform offers a diverse menu that caters to all tastes and dietary preferences, ensuring there is something for everyone. We provide you with fresh, delicious dishes that are carefully prepared and delivered in a timely manner. Whether you are craving comfort food, international cuisine, or healthy options, our user-friendly website makes it easy to satisfy your hunger with just a few clicks. Experience the worry-free joy of dining with [Epic Eats] today!</p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-01.png" alt="">
         <h3>choose order</h3>
         <p>"Select your favorites with ease."</p>
      </div>

      <div class="box">
         <img src="images/step-02.png" alt="">
         <h3>fast delivery</h3>
         <p>"Your food, delivered in minutes."</p>
      </div>

      <div class="box">
         <img src="images/step-03.png" alt="">
         <h3>enjoy food</h3>
         <p>"Savor every bite of your delicious meal."</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">customer's reivews</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/pic-01.png" alt="">
            <p>The spaghetti here is phenomenal! The pasta was cooked to perfection, and the sauce had a rich, deep flavor that was absolutely delicious. The staff was friendly and attentive, making sure we had everything we needed. I can't wait to come back and try more dishes. Highly recommended!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <h3>Amanda Johnson</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-02.png" alt="">
            <p>I ordered the spaghetti and was blown away by the quality. The sauce was bursting with flavor, and the pasta was cooked to al dente perfection. The restaurant had a charming and relaxed vibe, and the service was impeccable. I highly recommend it for anyone looking for a great meal.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Emily Davis</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-03.png" alt="">
            <p>I tried the pizza, and it was absolutely amazing. The crust was perfectly thin and crispy, and the toppings were fresh and delicious. The restaurant had a cozy and inviting atmosphere, and the staff was incredibly friendly and attentive. I will definitely be coming back soon!</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
               
            </div>
            <h3>Olivia Martinez</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-04.png" alt="">
            <p>The spaghetti here is out of this world. The pasta was cooked just right, and the sauce had a depth of flavor that made each bite a pleasure. The ambiance of the restaurant was warm and welcoming, and the service was excellent. I can't wait to try more items on the menu.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Chloe Nguyen</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-05.png" alt="">
            <p>I tried the pizza, and it was one of the best I've ever had. The crust was crispy, the cheese was melted just right, and the toppings were fresh and plentiful. The atmosphere of the restaurant was warm and welcoming, and the service was top-notch. Definitely a great spot for pizza lovers.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               
            </div>
            <h3>Michael Thompson</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-6.png" alt="">
            <p>The dessert selection is incredible. I had the cheesecake, and it was the best I've ever tasted. Creamy, rich, and just the right amount of sweetness. The restaurant itself was charming, and the staff made sure we had everything we needed. A perfect place for a sweet treat after a meal.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Sophia Patel</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>


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

<!-- reviews section ends -->



















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>