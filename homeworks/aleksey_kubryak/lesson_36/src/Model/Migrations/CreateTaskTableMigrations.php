<?php

namespace Model\Migrations;

use Model\Database;

class CreateTaskTableMigrations
{
    public function __construct(
        protected Database $db
    ) {
    }

    public function up(): void 
    {
        $this->db->connection()->query('CREATE TABLE IF NOT EXISTS task (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(255) NOT NULL, 
            description TEXT NULL,
            dueDate DATETIME NOT NULL,
            status INT NOT NULL DEFAULT 0,
            createAt DATETIME NOT NULL DEFAULT now(),
            executedAt DATETIME NULL
        )');
    }

    public function down(): void 
    {
        $this->db->connection()->query('DROP TABLE IF EXISTS task');
    }
}