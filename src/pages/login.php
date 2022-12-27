<?php

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
    <link rel="icon" href="../../iconPalette.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body class="flex flex-col items-center justify-center h-screen w-screen bg-gradient-to-r from-maximumRed via-maximumYellowRed to-lemonMeringue">
    <main class="flex flex-col h-5/6 w-3/6 bg-prussianBlue text-lemonMeringue border-4 border-double rounded-md border-lemonMeringue items-center justify-center relative">
        <?php
        if (isset($_GET['state'])) {
            $state = $_GET['state'];
            if ($state == "registered") : ?> <h1 class="text-4xl text-green-600 border-2 border-green-600 rounded-md">Inscription réussie</h1>
            <?php endif;
        } ?>
        <?php if (isset($_GET['error'])){
            $error = $_GET['error'];
            if ($error == "noUser") : ?> <h1 class="text-4xl text-maximumRed text-center border-2 border-maximumRed rounded-md">Erreur : vous n'avez pas de compte, veuillez vous enregistrer</h1>
            <?php elseif ($error == "wrongPassword") : ?> <h1 class="text-4xl text-maximumRed border-2 border-maximumRed rounded-md">Erreur : votre mot de passe ne correspond pas</h1>
        <?php endif; } ?>
        <h1 class="text-6xl absolute top-2 font-bold">Connexion</h1>
        <form method="post" action="login.php" class="flex flex-col h-4/6 justify-center space-y-12 w-4/6 text-2xl">
            <label class="flex justify-between flex-wrap">Email
                <input type="email" placeholder="email" name="email" required class="border-orange border-2 rounded-md bg-prussianBlue text-center">
            </label>
            <label class="flex justify-between flex-wrap">Mot de passe
                <input type="password" placeholder="mot de passe" name="password" required class="border-orange border-2 rounded-md bg-prussianBlue text-center">
            </label>
            <div class="text-center">
                <button type="submit" class="border-2 border-orange rounded-md w-2/6 text-2xl text-maximumRed hover:text-lemonMeringue hover:bg-maximumRed bg-lemonMeringue font-bold">Connexion</button>
            </div>
        </form>
        <a href="../../index.php" class="flex border-2 border-orange rounded-md w-1/6 text-2xl text-maximumRed hover:text-lemonMeringue hover:bg-maximumRed bg-lemonMeringue absolute bottom-2 font-bold justify-center">Accueil</a>
    </main>
    <footer class="absolute bottom-0 flex flex-row space-x-2 bottom-0 h-12 text-center bg-prussianBlue w-screen justify-center items-center border-lemonMeringue border-t-2 rounded-t-md">
        <h3 class="text-2xl text-lemonMeringue">Site créé par</h3>
        <a href="https://github.com/Timeuh" class="text-2xl text-lemonMeringue hover:text-maximumRed font-bold">Timeuh</a>
    </footer>
</body>
</html>