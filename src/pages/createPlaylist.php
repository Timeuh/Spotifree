<?php

use timeuh\spotifree\audio\Playlist;
use timeuh\spotifree\database\DBConnect;

require_once "../../vendor/autoload.php";

session_start();
DBConnect::init("../../dbconfig.ini");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $playlist = new Playlist($title);

    $insertionStatus = $playlist->insert();
    header("Location: userPlaylist.php?insertion=$insertionStatus");
    exit();
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
<body class="w-screen h-screen background text-center text-burnt-sienna-200 flex flex-col">
<main>
    <h1>Créez votre playlist</h1>
    <form method="post" action="createPlaylist.php">
        <label> Titre
            <input type="text" name="title" required>
        </label>
        <button type="submit">Créer</button>
    </form>
    <a href="home.html">Accueil</a>
    <a href="userPLaylists.php">Retour</a>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>
