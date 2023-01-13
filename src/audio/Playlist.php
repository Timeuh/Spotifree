<?php

namespace timeuh\spotifree\audio;

use timeuh\spotifree\database\DBConnect;

class Playlist {
    private int $id, $size, $duration;
    private string $title;
    private array $tracks;

    public function __construct(int $size, int $duration, string $title) {
        $this->size = $size;
        $this->duration = $duration;
        $this->title = $title;
        $this->tracks = [];
    }

    public function insert(): bool {
        $db = DBConnect::makeConnection();
        if ($db == null) return false;

        $insert = $db->prepare("insert into playlist(size, duration, title) values(:size, :duration, :title)");
        $insert->bindParam(':size', $this->size);
        $insert->bindParam(':duration', $this->duration);
        $insert->bindParam(':title', $this->title);
        return $insert->execute();
    }

    public function update(): bool {
        $db = DBConnect::makeConnection();
        if ($db == null) return false;

        $update = $db->prepare("update playlist set size = :size, duration = :duration, title = :title where id_playlist = :id");
        $update->bindParam(':size', $this->size);
        $update->bindParam(':duration', $this->duration);
        $update->bindParam(':title', $this->title);
        $update->bindParam(':id', $this->id);
        return $update->execute();
    }

    public function findTracks(): void {
        $db = DBConnect::makeConnection();
        if ($db == null) return;

        $find = $db->prepare("select id_track from playlist2track where id_playlist = :id");
        $find->bindParam(':id', $this->id);
        $find->execute();

        while ($data = $find->fetch()) {
            $trackId = $data['id_track'];
            $track = Track::findById($trackId);

            if ($track == null) continue;
            $this->tracks[] = $track;
        }
    }

    public static function findById(int $id): ?Playlist {
        $db = DBConnect::makeConnection();
        if ($db == null) return null;

        $query = $db->query("select * from playlist where id_playlist = :id");
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetch();
        $size = $data['size'];
        $duration = $data['duration'];
        $title = $data['title'];

        $res = new Playlist($size, $duration, $title);
        $res->setId($id);
        return $res;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function addTrack(Track $track): void {
        $this->tracks[] = $track;
        $this->size++;
        $this->duration += $track->getDuration();
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getSize(): int {
        return $this->size;
    }

    public function getTracks(): array {
        return $this->tracks;
    }
}