<?php

namespace App;

use mysqli;

class Database
{
    private mysqli $connection;

    public function __construct(array $config)
    {
        $this->connection = new mysqli(
            $config['host'],
            $config['user'],
            $config['password'],
            $config['dbname']
        );

        if ($this->connection->connect_error) {
            die("Database connection error: " . $this->connection->connect_error);
        }
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}
