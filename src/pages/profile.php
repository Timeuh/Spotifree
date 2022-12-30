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
<body>
<main>
    <div id="container">
        <div id="profile">
            <h2>Nom</h2><label><?php print($profile[1]); ?></label>
            <h2>Prenom</h2><label><?php print($profile[0]); ?></label>
            <h2>Age</h2><label><?php print($profile[2]); ?></label>
            <h2>Genre favori</h2><label><?php print($profile[3]); ?></label>
        </div>
    </div>
    <div id="links">
        <a href="changeProfile.html">
            <span>Modifier les informations</span>
        </a>
        <a href="home.html">
            <span>Accueil</span>
        </a>
    </div>
</main>
<footer>
    <h3>Site créé par</h3>
    <a href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>
