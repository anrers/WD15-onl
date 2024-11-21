<?php

namespace Database;

use mysqli;

final class DatabaseConnection
{
    private static ?DatabaseConnection $connection = null;

    protected function __construct()
    {}
    public function connect(): mysqli
    {
        // чтение параметров в файле конфигурации ini
        $params = parse_ini_file('database.ini');

        return new mysqli(
            $params["hostname"],
            $params["user"],
            $params["password"],
            $params["database"],
        );
    }

    public static function getConnection(): ?DatabaseConnection
    {
        if (null === static::$connection) {
            static::$connection = new self();
        }

        return static::$connection;
    }
}