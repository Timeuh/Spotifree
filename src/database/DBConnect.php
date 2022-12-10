<?php

namespace timeuh\spotifree\database;

class DBConnect {
    private static ?\PDO $db = null;
    private static ?array $config = null;

    public static function init(string $file) : void {
        if (self::$config == null) self::$config = parse_ini_file($file);
    }

    public static function makeConnection() : \PDO{
        if (self::$db == null) {
            $driver = self::$config['driver'] ?? "default";
            $user = self::$config['username'] ?? "default";
            $pass = self::$config['password'] ?? "default";
            $host = self::$config['host'] ?? "default";
            $database = self::$config['database'] ?? "default";

            if ($driver != "default" && $host != "default" && $database != "default"){
                $dsn = "$driver:host=$host; dbname=$database";
                if ($user != "default" && $pass != "default"){
                    try {
                        self::$db = new \PDO($dsn, $user, $pass, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    } catch (\Exception $e){
                        print $e;
                    }
                }
            }
        }
        return self::$db;
    }
}