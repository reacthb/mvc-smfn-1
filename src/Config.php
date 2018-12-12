<?php

namespace App;

/**
 * Configuration for database connection
 *
 */
class Config {

    const HOST = "localhost";
    const USERNAME = "root";
    const TABLEUSERS = "users";
    const PASSWORD = "2357@Mysql";
    const DBNAME = "mvc_crud";
    static $dsn = 'mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8';

    static $options = array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    );

}
