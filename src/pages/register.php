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
    <link rel="icon" href="../../iconPalette.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body class="flex flex-col items-center justify-center h-screen w-screen bg-gradient-to-r from-maximumRed via-maximumYellowRed to-lemonMeringue">
<main class="flex flex-col h-5/6 w-3/6 text-lemonMeringue border-2 rounded-md items-center justify-center relative background-plate">
    <h1 class="text-6xl absolute top-2 font-bold">Inscription</h1>
    <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == "passwordDiff") : ?> <h1 class="text-4xl text-maximumRed">Erreur : vos mots de passe doivent
                correspondre</h1>
            <?php elseif ($error == "passwordForce") : ?> <h1 class="text-4xl text-maximumRed">Erreur : votre mot de
                passe est trop faible</h1>
            <?php elseif ($error == "alreadyExist") : ?> <h1 class="text-4xl text-maximumRed text-center pt-12">Erreur :
                votre compte existe déjà, veuillez vous connecter</h1>
            <?php endif;
        } ?>
    <form method="post" action="register.php" class="flex flex-col h-4/6 justify-center space-y-12 w-4/6 text-2xl">
        <label class="flex justify-between flex-wrap">Email
            <input type="email" placeholder="email" name="email" required class="form-content">
        </label>
        <label class="flex justify-between flex-wrap">Mot de passe
            <input type="password" placeholder="mot de passe" name="password" required class="form-content">
        </label>
        <label class="flex justify-between flex-wrap">Répéter le mot de passe
            <input type="password" placeholder="répéter le mot de passe" name="repeat" required class="form-content">
        </label>
        <div class="text-center">
            <button type="submit" class="button-default">
                <span class="button-content">Confirmer</span>
            </button>
        </div>
    </form>
    <a href="../../index.php" class="button-default">
        <span class="button-content">Accueil</span>
    </a>
</main>
<footer class="absolute bottom-0 flex flex-row space-x-2 bottom-0 h-12 text-center w-screen justify-center items-center border-t-2 rounded-t-md background-plate">
    <h3 class="text-2xl text-lemonMeringue">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="text-2xl text-maximumRed hover:text-prussianBlue font-bold">Timeuh</a>
</footer>
</body>
</html>