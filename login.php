<?php
session_start();
include 'connexion.php';

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";
$results = $pdo->query($query);
$result = $results->fetch();

if($result) {
    // Utilisateur trouvé, démarrez une session et redirigez vers la page d'accueil
    $_SESSION['username'] = $username;
    header('Location: home.php');
} else {
    // Utilisateur non trouvé, affichez un message d'erreur
    echo "Nom d'utilisateur ou mot de passe incorrect";
}
$pdo = null;
?>