<?php
namespace timeuh\spotifree\pages;

require_once "../../vendor/autoload.php";

use timeuh\spotifree\auth\Auth;
use timeuh\spotifree\database\DBConnect;

DBConnect::init("../../dbconfig.ini");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
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
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body class="background h-screen w-screen flex text-burnt-sienna-200 text-center">
<header class="flex flex-lig justify-center items-center background-plate w-1/3 px-12 space-x-8">
    <img src="../img/icon.png" alt="icone du site">
    <h1 class="font-bold text-6xl drop-shadow-lg gradient-text">Inscription</h1>
</header>
<main class="flex flex-col background-plate w-full h-full justify-center">
    <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == "passwordDiff") : ?> <h1 class="site-error">Erreur : vos mots de passe doivent
                correspondre</h1>
            <?php elseif ($error == "passwordForce") : ?> <h1 class="site-error">Erreur : votre mot de
                passe est trop faible</h1>
            <?php elseif ($error == "alreadyExist") : ?> <h1 class="site-error">Erreur :
                votre compte existe déjà, veuillez vous connecter</h1>
            <?php endif;
        } ?>
    <div class="flex flex-col items-center h-4/6 justify-center">
        <form method="post" action="register.php" class="form-style w-4/6 h-5/6 justify-start py-12">
            <label class="flex flex-col items-start">Email
                <input type="email" placeholder="Email@domaine.com" name="email" required class="form-input">
            </label>
            <label class="flex flex-col items-start">Mot de passe
                <input type="password" placeholder="Mot de passe" name="password" required class="form-input">
            </label>
            <label class="flex flex-col items-start">Répéter le mot de passe
                <input type="password" placeholder="Répéter le mot de passe" name="repeat" required class="form-input">
            </label>
            <button type="submit" class="link text-4xl py-8">Confirmer</button>
        </form>
    </div>
    <a href="../index.php" class="link text-4xl">Accueil</a>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="link">Timeuh</a>
</footer>
</body>
</html>