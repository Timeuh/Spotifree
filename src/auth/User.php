<?php

namespace timeuh\spotifree\auth;

class User {
    private int $role;
    private string $email;

    public function __construct(int $role, string $email) {
        $this->role = $role;
        $this->email = $email;
    }
}