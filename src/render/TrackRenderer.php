<?php

namespace timeuh\spotifree\render;

use timeuh\spotifree\audio\Track;

class TrackRenderer {

    public static function render(Track $track): string {
        $title = $track->getTitle();
        $duration = $track->getDuration();
        $artist = $track->getArtist();
        $filename = $track->getFilename();

        $seconds = $duration % 60;
        $minutes = $duration / 60;

        return "<h1>$title</h1> par <b>$artist</b> durée : $minutes:$seconds
                <audio src=''></audio> 
        ";
    }
}