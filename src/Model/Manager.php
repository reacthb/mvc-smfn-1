<?php
namespace App\Model;
use App\Config;

class Manager {

    private static $db = false;

    protected function dbConnect() {
        //global $dsn, $username, $password, $options;
        $db = self::$db;
        if ($db === false) {
            //var_dump(Config::$dsn,Config::USERNAME, Config::PASSWORD);die();

            $db = new \PDO(Config::$dsn, Config::USERNAME, Config::PASSWORD, Config::$options);
        }
        return $db;
    }

}
