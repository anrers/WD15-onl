<?php

namespace Morozav\Lesson35\Model\Repositories;

use PDO;
use PDOException;

class DatabaseConnection
{
    private static ?DatabaseConnection $connection = null;

    protected function __construct() {}

    public function connect(): PDO
    {
        // чтение параметров в файле конфигурации ini
        $params = parse_ini_file(__DIR__ . "/../../config/database.ini");
        try {
            return new PDO(
                dsn: "mysql:host=" . $params['hostname'] . ";dbname="
                . $params["database"] . ";charset=utf8",
                username: $params["username"],
                password: $params["password"],
            );
        } catch (PDOException $exception) {
            echo "Database connection error: " . $exception->getMessage();
            throw new PDOException(
                "Database connection error: " . $exception->getMessage(),
            );
        }
    }

    public static function getConnection(): ?DatabaseConnection
    {
        if (null === static::$connection) {
            static::$connection = new self();
        }

        return DatabaseConnection::$connection;
    }
}