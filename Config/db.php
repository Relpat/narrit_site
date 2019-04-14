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
        $charset = "utf8";
        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=" . $db.";charset=".$charset."", $db_user, $db_pw
            ,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$charset."'"));
        }
        return self::$bdd;
    }
}

?>