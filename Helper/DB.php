<?php

namespace Bunkermaster\Helper;

/**
 * Class DB
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Helper
 */
class DB
{
    private static $db = null;

    public static function get()
    {
        if(is_null(self::$db)){
            try{
                self::$db = new \PDO('mysql:host=localhost;dbname=kandtg1','root','root');
                self::$db->exec('SET NAMES UTF8;');
            } catch(\PDOException $exception){
                die("Arrrghhh X_x mamaaaan...");
            }
        }
        return self::$db;
    }
}
