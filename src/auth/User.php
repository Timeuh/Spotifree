<?php

namespace timeuh\spotifree\auth;

use timeuh\spotifree\database\DBConnect;

class User {
    private int $role;
    private string $email;

    public function __construct(int $role, string $email) {
        $this->role = $role;
        $this->email = $email;
    }

    public function getProfile(): ?array {
        $profile = [];
        if (($db = DBConnect::makeConnection()) != null) {
            $query = $db->prepare("select name, surname, age, pref_style from profile where email = :email");
            $query->bindParam(':email', $this->email);
            $query->execute();

            while ($data = $query->fetch()) {
                $profile[0] = $data['name'];
                $profile[1] = $data['surname'];
                $profile[2] = $data['age'];
                $profile[3] = $data['pref_style'];
            }
        }
        return $profile;
    }

    public function updateInfos(array $profile): void {
        if (($db = DBConnect::makeConnection()) != null) {
            $update = $db->prepare("update profile set name= :name, surname= :surname, age= :age, pref_style= :style where email= :email");
            $update->bindParam(':name', $profile[0]);
            $update->bindParam(':surname', $profile[1]);
            $update->bindParam(':age', $profile[2]);
            $update->bindParam(':style', $profile[3]);
            $update->bindParam(':email', $this->email);
            $update->execute();
        }
    }

    public function findPlaylists(): ?array {
        $res = [];
        $db = DBConnect::makeConnection();
        if ($db == null) return $res;

        $querry = $db->prepare("select id_playlist from user2playlist where id_user = :user");
        $querry->bindParam(':user', $this->email);
        $querry->execute();

        while ($data = $querry->fetch()) {
            $playlistId = $data['id_playlist'];
            $search = $db->prepare("select title from playlist where id = :id");
            $search->bindParam(':id', $playlistId);
            $search->execute();
        }

        return $res;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getRole(): int {
        return $this->role;
    }
}