<?php

namespace timeuh\spotifree\auth;

use timeuh\spotifree\database\DBConnect;
use timeuh\spotifree\exception\PasswordNoMatchException;
use timeuh\spotifree\exception\PasswordNotStrongException;

DBConnect::init("../../dbconfig.ini");

class Auth {

    public static function register(string $email, string $password, string $repeat) : void{
        if ($password != $repeat) throw new PasswordNoMatchException();
        if (!self::check_password_strength($password, 8)) throw new PasswordNotStrongException();

        if (!self::check_user_registered($email)){
            if (($db = DBConnect::makeConnection()) != null){
                $filteredMail = filter_var($email, FILTER_SANITIZE_EMAIL);
                $hashedPass = password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);

                $insert = $db->prepare("insert into user(email,password) values (:email, :password)");
                $insert->bindParam(':email', $filteredMail);
                $insert->bindParam(':password', $hashedPass);
                $insert->execute();

                header("Location: ../pages/login.php?state=registered");
            }
        }
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

    private static function check_user_registered(string $email) : bool {
        if (($db = DBConnect::makeConnection()) != null){
            $query = $db->prepare("select * from user where email = :email");
            $query->bindParam(':email', $email);
            $query->execute();

            if (!$query->fetch()) return false;
        }
        return true;
    }
}