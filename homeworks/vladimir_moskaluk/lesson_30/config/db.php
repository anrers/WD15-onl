<?php

declare(strict_types=1);

namespace Config;

use PDO;
use PDOException;

class Database
{
    private string $host = 'mysql-8.2';
    private string $dbname = 'lesson_30';
    private string $user = 'root';
    private string $password = '';

    private ?PDO $connection = null;

    public function connect(): PDO
    {
        if ($this->connection === null) {
            try {
                $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
                $this->connection = new PDO($dsn, $this->user, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException("Database connection failed: " . $e->getMessage());
            }
        }

        return $this->connection;
    }
}
