<?php

class Database
{
    private $host = 'mysql-8.2';
    private $dbName = 'study';
    private $userName = 'root';
    private $password = '';
    public $connection;

    public function getConnection()
    {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->userName, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "There was an error with connection to the Data Base: " . $exception->getMessage();
        }

        return $this->connection;
    }
}