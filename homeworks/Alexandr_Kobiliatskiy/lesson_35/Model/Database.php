<?php

namespace Model;

use PDO;

class Database
{
    protected static ?PDO $connToServer = null;
    protected static ?PDO $connection = null;

    public function connectionToMySqlServer(): PDO
    {
        $connToServer = self::$connToServer;
        if (!$connToServer) {
            $connToServer = new PDO(
                'mysql:host=mysql-8.2;port=3306;charset=utf8',
                'root'
            );

            self::$connToServer = $connToServer;
        }

        return $connToServer;

    }

    public function connection(): PDO
    {
        $connection = self::$connection;

        if (!$connection) {
            $connection = new PDO(
                'mysql:host=mysql-8.2;port=3306;charset=utf8;dbname=mvc',
                'root'
            );

            self::$connection = $connection;
        }

        return $connection;
    }

}