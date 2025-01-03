<?php

// require("assets/chat-api/vendor/autoload.php");
require("vendor/autoload.php");

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$client = new Client("AIzaSyA8mpF39fAgbuQCLWzOjJ6Ute2O0ZOPPkU");

if(isset($_POST["send"])){
    
    $message = (!isset($_POST["message"])) ? "Good Morning" : $_POST["message"];
    $response = $client->geminiPro()->generateContent(
        new TextPart($message),
    );
    
    $replay = $response->text();
    ($response != null)? insertChat($message, $replay, $conn) : null;
    echo "<script> document.getElementById('chatbot').classList.remove('main-card-collapsed'); </script>";
}

function insertChat($message, $replay, $conn){
    $user_id = $_SESSION["s_user_id"];
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO chats (MESSAGE, REPLAY, USER_ID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $message, $replay, $user_id); // "ssi" = string, string, integer
    
    // Execute the query and check for errors
    if ($stmt->execute()) {   

    } else {
        echo $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

