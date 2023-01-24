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

    public static function findById(int $id): ?Track {
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

    public function getDuration(): int {
        return $this->duration;
    }

    public function getArtist(): string {
        return $this->artist;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getFilename(): string {
        return $this->filename;
    }

    public function getId(): int {
        return $this->id;
    }
}