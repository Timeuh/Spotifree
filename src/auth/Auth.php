<?php

namespace timeuh\spotifree\auth;

use timeuh\spotifree\database\DBConnect;
use timeuh\spotifree\exception\AlreadyRegisteredException;
use timeuh\spotifree\exception\NoUserException;
use timeuh\spotifree\exception\PasswordNoMatchException;
use timeuh\spotifree\exception\PasswordNotStrongException;
use timeuh\spotifree\exception\PasswordWrongException;

DBConnect::init("../../dbconfig.ini");

class Auth {

    public static function register(string $email, string $password, string $repeat) : void{
        if ($password != $repeat) throw new PasswordNoMatchException();
        if (!self::check_password_strength($password, 8)) throw new PasswordNotStrongException();
        if (self::check_user_registered($email)) throw new AlreadyRegisteredException();

        else {
            if (($db = DBConnect::makeConnection()) != null){
                $filteredMail = filter_var($email, FILTER_SANITIZE_EMAIL);
                $hashedPass = password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);
                $infos = ["John", "Doe", 18, "Classique"];

                $insert = $db->prepare("insert into user(email,password) values (:email, :password)");
                $insert->bindParam(':email', $filteredMail);
                $insert->bindParam(':password', $hashedPass);
                $insert->execute();

                $profile = $db->prepare("insert into profile(email, name, surname, age, pref_style) values(:email, :name, :surname, :age, :style)");
                $profile->bindParam(':email', $filteredMail);
                $profile->bindParam(':name', $infos[0]);
                $profile->bindParam(':surname', $infos[1]);
                $profile->bindParam(':age', $infos[2]);
                $profile->bindParam(':style', $infos[3]);
                $profile->execute();

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

    public static function login(string $email, string $password) : void {
        $filteredMail = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (($db = DBConnect::makeConnection()) != null){
            $query = $db->prepare("select password, role from user where email = :email");
            $query->bindParam(':email', $filteredMail);
            $query->execute();

            if (!$data = $query->fetch()) throw new NoUserException();
            else {
                $pass = $data['password'];
                $role = $data['role'];

                if (!password_verify($password, $pass)) throw new PasswordWrongException();
                else {
                    $user = new User($role, $email);
                    $_SESSION['user'] = serialize($user);
                    header("Location: ../pages/home.html");
                }
            }
        }
    }
}