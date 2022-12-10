<?php
namespace timeuh\spotifree\pages;

use timeuh\spotifree\auth\Auth;

require_once "../../vendor/autoload.php";

$request = $_SERVER['REQUEST_METHOD'];
if ($request == "POST"){
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $repeat = $_POST['repeat'] ?? null;

    Auth::register($email, $password, $repeat);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Spotifree</title>
  <meta charset="UTF-8">
  <link rel="icon" href="iconPalette.png">
  <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <h1>Inscription</h1>
    <?php
    if (isset($_GET['error'])){
        $error = $_GET['error'];
        if ($error == "passwordDiff") : ?> <h1>Erreur : vos mots de passe doivent correspondre</h1>
    <?php elseif ($error == "passwordForce") : ?> <h1>Erreur : votre mot de passe est trop faible</h1>
    <?php endif; } ?>
    <form method="post" action="register.php">
        <label>Email
            <input type="email" placeholder="email" name="email" required>
        </label><br>
        <label>Mot de passe
            <input type="password" placeholder="mot de passe" name="password" required>
        </label><br>
        <label>Répéter le mot de passe
            <input type="password" placeholder="répéter le mot de passe" name="repeat" required>
        </label><br>
        <button type="submit">Confirmer</button>
    </form><br><br>
    <a href="../../index.php">Accueil</a>
</body>
</html>