<?php

namespace Morozav\Lesson35\Model\Repositories;

use PDO;
use PDOException;

class DatabaseConnection
{
    private static ?PDO $connection = null;

    protected function __construct() {}

    public static function getConnection(): ?PDO
    {
        $connection = self::$connection;

        if (!$connection) {
            $params = parse_ini_file(__DIR__ . "/../../config/database.ini");
            try {
                $connection = new PDO(
                    dsn: "mysql:host=" . $params['hostname'] . ";dbname="
                    . $params["database"] . ";charset=utf8",
                    username: $params["username"],
                    password: $params["password"],
                );
                self::$connection = $connection;
            } catch (PDOException $exception) {
                echo "Database connection error: " . $exception->getMessage();
                throw new PDOException(
                    "Database connection error: " . $exception->getMessage(),
                );
            }
        }

        return $connection;
    }
}