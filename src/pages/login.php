<?php
session_start();
use timeuh\spotifree\auth\Auth;

require_once "../../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    Auth::login($email, $password);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../../icon.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<main>
    <?php
        if (isset($_GET['state'])) {
            $state = $_GET['state'];
            if ($state == "registered") : ?> <h1>Inscription réussie</h1>
            <?php endif;
        } ?>
        <?php if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == "noUser") : ?> <h1>Erreur : vous n'avez pas de compte, veuillez vous enregistrer</h1>
            <?php elseif ($error == "wrongPassword") : ?> <h1>Erreur : votre mot de passe ne correspond pas</h1>
            <?php endif;
        } ?>
    <h1>Connexion</h1>
    <form method="post" action="login.php">
        <label>Email
            <input type="email" placeholder="email" name="email" required>
        </label>
        <label>Mot de passe
            <input type="password" placeholder="mot de passe" name="password" required>
        </label>
        <div>
            <button type="submit">
                <span>Connexion</span>
            </button>
        </div>
    </form>
    <a href="../../index.php">
        <span>Accueil</span>
    </a>
</main>
<footer>
    <h3>Site créé par</h3>
    <a href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>