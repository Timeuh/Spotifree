<?php

namespace timeuh\spotifree\render;

use timeuh\spotifree\audio\Playlist;

class PlaylistRenderer {

    public function render(Playlist $playlist): string {
        $title = $playlist->getTitle();
        $duration = $playlist->getDuration();
        $size = $playlist->getSize();
        $tracks = $playlist->getTracks();

        $minutes = floor($duration / 60);
        $seconds = $duration % 60;

        $trackRenderer = new TrackRenderer();

        $result = "<div class='text-3xl'>
                    <h1>$title</h1> Durée $minutes:$seconds, $size pistes
                   ";

        foreach ($tracks as $key => $value) {
            $result .= $trackRenderer->render($value);
        }

        $result .= "</div>";

        return $result;
    }
}