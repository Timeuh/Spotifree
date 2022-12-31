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
<body class="flex w-screen h-screen background text-burnt-sienna-200">
<header class="flex flex-lig justify-center items-center background-plate w-1/3 px-12 space-x-8">
    <img src="../../icon.png" alt="icone du site">
    <h1 class="font-bold text-6xl drop-shadow-lg gradient-text">Connexion</h1>
</header>
<main class="flex flex-col background-plate w-full h-full justify-center">
    <?php
        if (isset($_GET['state'])) {
            $state = $_GET['state'];
            if ($state == "registered") : ?> <h1 class="text-green-500 text-3xl text-center">Inscription réussie</h1>
            <?php endif;
        } ?>
        <?php if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == "noUser") : ?> <h1 class="site-error">Erreur : vous n'avez pas de compte, veuillez vous
                enregistrer</h1>
            <?php elseif ($error == "wrongPassword") : ?> <h1 class="site-error">Erreur : votre mot de passe ne
                correspond pas</h1>
            <?php endif;
        } ?>
    <div class="flex flex-col items-center h-4/6 justify-center">
        <form method="post" action="login.php" class="form-style w-4/6 h-5/6 justify-start py-12">
            <label class="flex flex-col items-start">Email
                <input type="email" placeholder="email" name="email" required class="form-input">
            </label>
            <label class="flex flex-col items-start">Mot de passe
                <input type="password" placeholder="mot de passe" name="password" required class="form-input">
            </label>
            <button type="submit" class="link text-4xl py-8">Connexion</button>
        </form>
    </div>
    <a href="../../index.php" class="link text-4xl text-center">Accueil</a>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="link">Timeuh</a>
</footer>
</body>
</html>