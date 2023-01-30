<?php

use timeuh\spotifree\audio\Playlist;
use timeuh\spotifree\database\DBConnect;
use timeuh\spotifree\render\PlaylistRenderer;

session_start();
require_once "../../vendor/autoload.php";
DBConnect::init("../../dbconfig.ini");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $playlistId = $_GET['id'];
    $playlist = Playlist::findById($playlistId);
    $renderer = new PlaylistRenderer();
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
<body class="w-screen h-screen background text-center text-burnt-sienna-200 flex flex-col">
<main class="py-12">
    <a class="link text-3xl" href="userPlaylists.php">Retour</a>
    <div class="py-12">
        <?php
        if (isset($_GET['presence'])) print "<h1 class='site-error py-4'>Cette musique est déjà dans votre playlist</h1>";
        print ($renderer->render($playlist));
        ?>
    </div>
    <a class="link text-2xl" href="catalogue.php">Ajouter une musique</a>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>
