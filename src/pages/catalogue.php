<?php

use timeuh\spotifree\audio\Playlist;
use timeuh\spotifree\audio\Track;
use timeuh\spotifree\render\PlaylistRenderer;

session_start();
require_once "../../vendor/autoload.php";

$catalogue = new Playlist(0, 0, "Catalogue");

for ($i = 0; $i < 11; $i++) {
    $track = Track::findById($i);
    $catalogue->addTrack($track);
}

$playlistRenderer = new PlaylistRenderer();
print $playlistRenderer->render($catalogue);