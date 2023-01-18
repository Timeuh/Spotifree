<?php

use timeuh\spotifree\database\DBConnect;

session_start();
require_once "../../vendor/autoload.php";
DBConnect::init("../../dbconfig.ini");

$user = unserialize($_SESSION['user']);
$playlists = $user->findPlaylists();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../../icon.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body class="h-screen w-screen background">
<main>
    <a href="home.html">Accueil</a>
    <?php
    if (isset($_GET['insertion'])) {
        $state = $_GET['insertion'];
        if ($state == 1) print ("<h1>Playlist créée</h1>");
        else print ("<h1>Échec de création, veuillez réessayer</h1>");
    }

    if ($playlists == []) {
        print ("<h1>Vous n'avez pas de playlist, créez-en une !</h1>");
    } else {
        foreach ($playlists as $key => $value) {
            $id = $value[0];
            $title = $value[1];

            print ("<a href='displayPlaylist.php?id=" . $id . "'>" . $title . "</a>");

        }
    }
    print("<a href='createPlaylist.php'>Créer une playlist</a>");
    ?>
</main>
<footer class="fixed bottom-0 flex flex-lig w-full justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>
