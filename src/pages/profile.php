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
<body class="flex flex-col items-center h-screen w-screen bg-gradient-to-br from-maximumRed via-maximumYellowRed to-lemonMeringue justify-center">
<main class="background-plate h-5/6 w-4/6 flex flex-col items-center border-2 rounded-md text-lemonMeringue justify-center">
    <div id="container" class="flex flex-col w-5/6 text-3xl">
        <div id="profile" class="grid grid-flow-rows grid-cols-2 grid-rows-4 text-center py-4 px-4">
            <h2 class="py-4">Nom</h2><label class="py-4 text-prussianBlue"><?php print($profile[1]); ?></label>
            <h2 class="py-4">Prenom</h2><label class="py-4 text-prussianBlue"><?php print($profile[0]); ?></label>
            <h2 class="py-4">Age</h2><label class="py-4 text-prussianBlue"><?php print($profile[2]); ?></label>
            <h2 class="py-4">Genre favori</h2><label class="py-4 text-prussianBlue"><?php print($profile[3]); ?></label>
        </div>
    </div>
    <div id="links" class="flex items-center py-12 w-4/6">
        <a href="changeProfile.html" class="button-default flex-1">
            <span class="button-content">Modifier les informations</span>
        </a>
        <a href="home.php" class="button-default flex-1">
            <span class="button-content h-full">Accueil</span>
        </a>
    </div>
</main>
<footer class="absolute bottom-0 flex flex-row space-x-2 bottom-0 h-12 text-center w-screen justify-center items-center border-t-2 rounded-t-md background-plate">
    <h3 class="text-2xl text-lemonMeringue">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="text-2xl text-maximumRed hover:text-prussianBlue font-bold">Timeuh</a>
</footer>
</body>
</html>
