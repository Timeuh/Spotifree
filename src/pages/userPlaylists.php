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
<body class="h-screen w-screen background text-center text-burnt-sienna-200 flex items-center justify-center">
<main class="background-plate h-1/2 w-1/2 flex flex-col justify-center items-center">
    <a class="link text-3xl" href="home.html">Accueil</a>
    <?php
    if (isset($_GET['insertion'])) {
        $state = $_GET['insertion'];
        if ($state == 1) print ("<h1 class='text-green-500 text-2xl'>Playlist créée</h1>");
        else print ("<h1 class='site-error'>Échec de création, veuillez réessayer</h1>");
    } ?>
    <div class="py-20">
        <?php
        if ($playlists == []) {
            print ("<h1>Vous n'avez pas de playlist, créez-en une !</h1>");
        } else {
            foreach ($playlists as $key => $value) {
                $id = $value[0];
                $title = $value[1];

                print ("<a class='flex text-burnt-sienna-500 hover:text-lavender-400 w-fit transition py-2' 
                    href='displayPlaylist.php?id=" . $id . "'>" . $title . "</a>");
            }
        } ?>
    </div>
    <?php
    print("<a class='link text-2xl' href='createPlaylist.php'>Créer une playlist</a>");
    ?>
</main>
<footer class="fixed bottom-0 flex flex-lig w-full justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>
