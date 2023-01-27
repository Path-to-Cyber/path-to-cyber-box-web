<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Save your secret here : </h1>
    <?php
    session_start();
    include('connexion.php');
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT id, message FROM messages WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
        $results = $pdo->query($query);
        echo "<h2>Your secret : </h2>";
        echo "<ul>";
        while ($row = $results->fetch()) {
            echo "<li><a href='view_message.php?id=". $row['id'] . "'>" . $row['message'] . "</a></li>";
        }
        echo "</ul>";
        $pdo = null;
    }else{
        header('Location: index.php');
    }
    ?>
    <form action="add_message.php" method="post">
        <label for="message">Ajouter un message :</label>
        <input type="text" id="message" name="message">
        <input type="submit" value="Envoyer">
    </form>
  </body>
</html>
