<?php

namespace auth;

class Auth {

    public static function register(string $email, string $password, string $repeat) : bool{
        if ($password != $repeat) return false;
        if (!self::check_password_strength($password, 8)) return false;
        return true;
    }

    private static function check_password_strength(string $password, int $length) : bool{
        $goodLength = strlen($password) < $length;
        $digit = preg_match("#\d#", $password);
        $special = preg_match("#\W#", $password);
        $lower = preg_match("#[a-z]#", $password);
        $upper = preg_match("#[A-Z]#", $password);
        if ($goodLength || !$digit || !$special || !$lower || !$upper) return false;
        return true;
    }
}