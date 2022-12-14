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
    <main class="flex flex-col h-5/6 w-3/6 bg-prussianBlue text-lemonMeringue border-4 border-double rounded-md border-lemonMeringue items-center justify-center relative">
        <h1 class="text-6xl absolute top-2 font-bold">Inscription</h1>
        <?php
        if (isset($_GET['error'])){
            $error = $_GET['error'];
            if ($error == "passwordDiff") : ?> <h1 class="text-4xl text-maximumRed border-2 border-maximumRed rounded-md">Erreur : vos mots de passe doivent correspondre</h1>
            <?php elseif ($error == "passwordForce") : ?> <h1 class="text-4xl text-maximumRed border-2 border-maximumRed rounded-md">Erreur : votre mot de passe est trop faible</h1>
            <?php elseif ($error == "alreadyExist") : ?> <h1 class="text-4xl text-maximumRed border-2 border-maximumRed rounded-md">Erreur : votre compte existe déjà, veuillez vous connecter</h1>
            <?php endif; } ?>
        <form method="post" action="register.php" class="flex flex-col h-4/6 justify-center space-y-12 w-4/6 text-2xl">
            <label class="flex justify-between flex-wrap">Email
                <input type="email" placeholder="email" name="email" required class="border-orange border-2 rounded-md bg-prussianBlue text-center text-lemonMeringue">
            </label>
            <label class="flex justify-between flex-wrap">Mot de passe
                <input type="password" placeholder="mot de passe" name="password" required class="border-orange border-2 rounded-md bg-prussianBlue text-center">
            </label>
            <label class="flex justify-between flex-wrap">Répéter le mot de passe
                <input type="password" placeholder="répéter le mot de passe" name="repeat" required class="border-orange border-2 rounded-md bg-prussianBlue text-center">
            </label>
            <div class="text-center">
                <button type="submit" class="border-2 border-orange rounded-md w-2/6 text-2xl text-maximumRed hover:text-lemonMeringue hover:bg-maximumRed bg-lemonMeringue font-bold">Confirmer</button>
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