<?php

namespace timeuh\spotifree\audio;

use timeuh\spotifree\database\DBConnect;

class Track {
    private int $id, $duration;
    private string $title, $artist, $filename;

    public function __construct(int $id, int $duration, string $title, string $artist, string $filename) {
        $this->id = $id;
        $this->duration = $duration;
        $this->title = $title;
        $this->artist = $artist;
        $this->filename = $filename;
    }

    public function findById(int $id): ?Track {
        $db = DBConnect::makeConnection();
        if ($db == null) return null;

        $query = $db->prepare("select * from track where id = :id");
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetch();
        $duration = $data['duration'];
        $title = $data['title'];
        $artist = $data['artist'];
        $filename = $data['filename'];

        return new Track($id, $duration, $title, $artist, $filename);
    }
}