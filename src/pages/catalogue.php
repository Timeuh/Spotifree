<?php

use timeuh\spotifree\audio\Playlist;
use timeuh\spotifree\audio\Track;
use timeuh\spotifree\database\DBConnect;
use timeuh\spotifree\render\PlaylistRenderer;

session_start();
require_once "../../vendor/autoload.php";
DBConnect::init("../../dbconfig.ini");

$catalogue = new Playlist(0, 0, "Catalogue");

for ($i = 1; $i < 11; $i++) {
    $track = Track::findById($i);
    $catalogue->addTrack($track);
}

$playlistRenderer = new PlaylistRenderer();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../../icon.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body class="w-full h-full background text-center text-burnt-sienna-200 flex flex-col">
<main>
    <?php print $playlistRenderer->render($catalogue); ?>
    <a class="link text-3xl" href="home.html">Accueil</a>
</main>
<footer class="bottom-0 flex flex-lig w-full justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>