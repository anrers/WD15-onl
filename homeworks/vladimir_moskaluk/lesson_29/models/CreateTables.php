<?php

namespace Models;

use mysqli;

class CreateTables
{
    private mysqli $db;

    public function __construct(mysqli $connection)
    {
        $this->db = $connection;
    }

    public function createCustomersTable(): void
    {
        $query = "
            CREATE TABLE IF NOT EXISTS customers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                full_name VARCHAR(255) NOT NULL,
                address TEXT,
                phone VARCHAR(50),
                email VARCHAR(255) UNIQUE
            )
        ";
        $this->db->query($query);
    }

    public function createMoviesTable(): void
    {
        $query = "
            CREATE TABLE IF NOT EXISTS movies (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                release_year INT,
                genres JSON,
                director VARCHAR(255),
                main_actors JSON,
                duration_minutes INT
            )
        ";
        $this->db->query($query);
    }

    public function createStudentsTable(): void
    {
        $query = "
            CREATE TABLE IF NOT EXISTS students (
                id INT AUTO_INCREMENT PRIMARY KEY,
                full_name VARCHAR(255) NOT NULL,
                group_name VARCHAR(50),
                birth_date DATE,
                address TEXT,
                phone VARCHAR(50),
                email VARCHAR(255) UNIQUE
            )
        ";
        $this->db->query($query);
    }
}
