<?php

use timeuh\spotifree\database\DBConnect;

require_once '../../vendor/autoload.php';

session_start();
DBConnect::init("../../dbconfig.ini");

$user = unserialize($_SESSION['user']) ?? null;
if ($user != null) $profile = $user->getProfile();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
    $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
    $favorite = filter_var($_POST['favorite'], FILTER_SANITIZE_STRING);

    $profile[0] = $name;
    $profile[1] = $surname;
    $profile[2] = $age;
    $profile[3] = $favorite;

    $user->updateInfos($profile);
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
<body>
<main>
    <div id="container">
        <div id="profile">
            <h2>Nom</h2><label><?php print($profile[1]); ?></label>
            <h2>Prenom</h2><label><?php print($profile[0]); ?></label>
            <h2>Age</h2><label><?php print($profile[2]); ?></label>
            <h2>Genre favori</h2><label><?php print($profile[3]); ?></label>
        </div>
        <div id="links">
            <a href="changeProfile.html">Modifier les informations</a>
            <a href="home.php">Accueil</a>
        </div>
    </div>
</main>
<footer class="absolute bottom-0 flex flex-row space-x-2 bottom-0 h-12 text-center bg-prussianBlue w-screen justify-center items-center border-lemonMeringue border-t-2 rounded-t-md">
    <h3 class="text-2xl text-lemonMeringue">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="text-2xl text-lemonMeringue hover:text-maximumRed font-bold">Timeuh</a>
</footer>
</body>
</html>
