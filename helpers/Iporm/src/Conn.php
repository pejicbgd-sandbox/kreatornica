<?php

namespace iporm\db;

class Conn
{
    private static $_host;

    private static $_username;

    private static $_password;

    private static $_db;

    private static $_con;

    private static function connect()
    {
        self::$_con = mysqli_connect(self::$_host, self::$_username, self::$_password, self::$_db);
    }

    public static function getInstance($settings)
    {
        if(!is_object(self::$_con))
        {
            self::$_host = $settings['host'];
            self::$_username = $settings['username'];
            self::$_password = $settings['password'];
            self::$_db = $settings['db'];

            self::connect();
        }
        return self::$_con;
    }
}
