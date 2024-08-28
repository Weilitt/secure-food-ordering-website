

<?php

include 'components/connect.php';
include 'components/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>

  <!-- Font Awesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- Custom CSS file link -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Header section starts -->
  <?php include 'components/user_header.php'; ?>
  <!-- Header section ends -->

  <div class="heading">
    <h3>Feedback Form</h3>
    <p><a href="home.php">home</a> <span> / feedback</span></p>
  </div>

  <div class="container">
    <form id="contactz" action="mailz.php" method="post">
      <h1>Feedback Form</h1>
      
      <fieldset>
        <label for="name">Your name</label>
        <input id="name" placeholder="Your name" name="name" type="text" tabindex="1" autofocus required>
      </fieldset>
      <fieldset>
        <label for="email">Your Email Address</label>
        <input id="email" placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
      </fieldset>
      <fieldset>
        <label for="subject">Subject</label>
        <input id="subject" placeholder="Type your subject line" type="text" name="subject" tabindex="3" required>
      </fieldset>
      <fieldset>
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Type your Message Details Here..." tabindex="4" required></textarea>
      </fieldset>
      <fieldset>
        <button type="submit" name="send" id="contactz-submit">Submit Now</button>
      </fieldset>
    </form>
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

  <!-- Footer section starts -->
  <?php include 'components/footer.php'; ?>
  <!-- Footer section ends -->

  <!-- Custom JS file link -->
  <script src="js/script.js"></script>
</body>

</html>
