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
        $minutes = floor($duration / 60);

        return "<div class='flex flex-col justify-center items-center py-12 text-xl'>
                <h1 class='text-3xl text-burnt-sienna-300'>$title</h1>
                <p>Par <b class='text-lavender-300'>$artist</b>, Durée <b class='text-lavender-300'>$minutes:$seconds</b></p> 
                <audio class='pt-4' src='../music/$filename.mp3' controls></audio> 
                </div>
                ";
    }
}