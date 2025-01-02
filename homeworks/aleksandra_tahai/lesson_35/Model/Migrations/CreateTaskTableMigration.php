<?php

namespace Model\Migrations;

use Model\Database;

class CreateTaskTableMigration
{
    public function __construct(
        protected Database $db
    ) {

    }

    public function up(): void
    {
        $this->db->connection()->query("CREATE TABLE IF NOT EXISTS tasks (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            dueDate DATE NOT NULL,
            status INT NOT NULL DEFAULT 0,
            createdAt DATETIME NOT NULL DEFAULT now(),
            executedAt DATETIME NOT NULL DEFAULT now())");
    }

    public function down(): void
    {
        $this->db->connection()->query("DROP TABLE if EXISTS tasks");
    }
}