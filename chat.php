<?php
$servername = "localhost"; // Change to your database server
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "food_db"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_type = $_POST['user_type'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messagesss (user_type, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_type, $message);
    $stmt->execute();
    $stmt->close();

    if ($user_type === 'user') {
        $bot_response = "Thank you for your message. We will get back to you shortly.";
        $lowercase_message = strtolower(trim($message));
        if ($lowercase_message === 'time') {
            $bot_response = "We're open from 8:00 a.m to 11:10 p.m.";
        } elseif ($lowercase_message === 'place') {
            $bot_response = "Kajang, 43000, Malaysia.";
        } elseif ($lowercase_message === 'gmail') {
            $bot_response = "Gmail: leeweilit0602@e.newera.edu.my";
        } elseif ($lowercase_message === 'website name') {
            $bot_response = "Epic Eats";
        } elseif ($lowercase_message === 'menu') {
            $bot_response = "We have pizza, burger, dish, drink, dessert";
        } elseif ($lowercase_message === 'thank you') {
            $bot_response = "You're welcome";
        } elseif ($lowercase_message === 'contact') {
            $bot_response = "123-456-7890";
        } elseif ($lowercase_message === 'hi') {
            $bot_response = "Hi, How can i help you?";
        } elseif ($lowercase_message === 'Why cannot make order?') {
            $bot_response = "You need to verify your email to place and order";
        } elseif ($lowercase_message === 'Bye') {
            $bot_response = "Thank you for coming";
        } elseif ($lowercase_message === 'Which one is your favourite food') {
            $bot_response = "I will choose Pizza 01";
        }elseif ($lowercase_message === 'I havent decided what to eat yet') {
            $bot_response = "Maybe the footer can give you some ideas";
        }

        $stmt = $conn->prepare("INSERT INTO messagesss (user_type, message) VALUES ('bot', ?)");
        $stmt->bind_param("s", $bot_response);
        $stmt->execute();
        $stmt->close();
    }

    echo json_encode(['status' => 'success']);
} else {
    $result = $conn->query("SELECT * FROM messagesss ORDER BY timestamp ASC");
    $messagesss = [];
    while($row = $result->fetch_assoc()) {
        $messagesss[] = $row;
    }
    echo json_encode($messagesss);
}

$conn->close();
?>
