<?php

namespace Model\Migrations;

use Model\Database;

class CreateTaskTableMigration
{
    public function __construct(
        protected Database $db
    )
    {
    }

    public function up(): void
    {
        $this->db->connection()->query('CREATE TABLE IF NOT EXISTS tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) not null,
    description VARCHAR(255),
    dueDate DATETIME NOT NULL,
    status INT not null DEFAULT 0,
    createdAt DATETIME NOT NULL DEFAULT now(),
    executedAt DATETIME NULL
    )');
    }

    public function down(): void
    {
        $this->db->connection()->query('DROP TABLE if exists tasks');
    }
}