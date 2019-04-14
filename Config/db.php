<?php

class Database
{
    private static $bdd = null;

    private function __construct()
    {
    }

    public static function getBdd()
    {
        $db = "db12243013-narrit";
        $db_user = "db12243013-narr";
        $db_pw = "narrit753159";
        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=" . $db, $db_user, $db_pw);
        }
        return self::$bdd;
    }
}

?>