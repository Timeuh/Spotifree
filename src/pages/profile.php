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
    <link rel="icon" href="../../icon.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body class="background h-screen w-screen justify-center items-center flex text-burnt-sienna-200">
<main class="flex flex-col background-plate justify-center items-center h-5/6 w-3/5 rounded-md">
    <div id="profile" class="space-y-12 text-3xl text-center font-bold">
        <div id="user" class="grid grid-cols-3 justify-self-center items-center">
            <img alt="icone du site" class="object-none h-40 w-40" src="../img/profile.png">
            <label><?php print($profile[0]); ?></label>
            <label><?php print($profile[1]); ?></label>
        </div>
        <div id="age" class="grid grid-cols-2 justify-self-center items-center">
            <img alt="icone du site" class="object-none h-40 w-40" src="../img/birthday.png">
            <label><?php print($profile[2]); ?></label>
        </div>
        <div id="favorite" class="grid grid-cols-2 justify-self-center items-center">
            <img alt="icone du site" class="object-none h-40 w-40" src="../img/heart.png">
            <label><?php print($profile[3]); ?></label>
        </div>
    </div>
    <div id="links" class="grid grid-cols-2 w-full text-center text-3xl pt-12 mt-12">
        <a href="changeProfile.html" class="link">Modifier les informations</a>
        <a href="home.html" class="link">Accueil</a>
    </div>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>
