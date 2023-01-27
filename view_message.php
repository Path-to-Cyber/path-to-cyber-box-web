<?php
  include 'connexion.php';
  $message_id = $_GET['id'];
  $query = "SELECT * FROM messages WHERE id = $message_id";
  $result = $pdo->query($query);
  $message = $result->fetch();
  $query = "SELECT * FROM users WHERE id = $message[user_id]";
  $result = $pdo->query($query);
  $author = $result->fetch();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="message-view-container">
      <h1 class="message-view-title">Secret Message</h1>
      <div class="message-view-content">
        <p class="message-view-text"><?php echo $message['message'] ?></p>
        <p class="message-view-author">Author: <?php echo $author['username'] ?></p>
      </div>
    </div>
  </body>
</html>
