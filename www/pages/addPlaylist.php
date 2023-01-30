<?php

use timeuh\spotifree\audio\Playlist;
use timeuh\spotifree\audio\Track;
use timeuh\spotifree\database\DBConnect;

require_once "../../vendor/autoload.php";
session_start();
DBConnect::init("../../dbconfig.ini");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!isset($_GET['track'])) return;
    $trackId = intval($_GET['track']);

    $track = Track::findById($trackId);
    $title = $track->getTitle();

    $user = unserialize($_SESSION['user']);
    $playlists = $user->findPlaylists();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $playlistId = intval($_POST['playlistChooser']);
    $trackId = intval($_GET['track']);
    $playlist = Playlist::findById($playlistId);
    $track = Track::findById($trackId);
    $duration = $track->getDuration();
    $size = $playlist->getSize();

    $db = DBConnect::makeConnection();
    $insert = $db->prepare("insert into playlist2track(id_playlist, id_track) values(:playlist, :track)");
    $insert->bindParam(':playlist', $playlistId);
    $insert->bindParam(':track', $trackId);
    $done = $insert->execute();
    Playlist::incrementSize($playlistId, $duration, $size);
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
<body class="w-screen h-screen background text-center text-burnt-sienna-200 flex flex-col justify-center items-center">
<main class="background-plate h-1/2 w-1/2 flex flex-col justify-center items-center">
    <?php if (isset($done)) {
        if ($done) print "<h1>Musique ajoutée</h1>";
        else print "<h1>Échec de l'ajout</h1>";
    } ?>
    <?php print "<form method='post' action='addPlaylist.php?track=" . $trackId . "'"; ?>
    <label>Ajouter <?php print "<span>$title</span>"; ?> : </label>
    <select name="playlistChooser" required>
        <option value="">--Choisissez une playlist--</option>
        <?php
        foreach ($playlists as $playlist) {
            print "<option value='" . $playlist[0] . "'>" . $playlist[1] . "</option>";
        }
        ?>
    </select>
    <button type="submit">Ajouter</button>
    </form>
    <a href="catalogue.php" class="link text-2xl py-4">Retour</a>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a class="link" href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>