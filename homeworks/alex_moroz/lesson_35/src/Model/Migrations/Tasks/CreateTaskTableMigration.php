<?php

namespace Morozav\Lesson35\Model\Migrations\Tasks;

use Morozav\Lesson35\Model\Repositories\DatabaseConnection;

class CreateTaskTableMigration
{
    public function __construct(
        protected DatabaseConnection $db,
    ) {}

    public function up(): void
    {
        $this->db->connect()->query(
            "
CREATE TABLE IF NOT EXISTS tasks (
    id INT NOT NULL AUTO_INCREMENT , 
    name VARCHAR(255) NOT NULL , 
    description TEXT NULL, 
    status INT NOT NULL DEFAULT 0 ,
    deadline DATETIME NOT NULL ,
    createdAt DATETIME NOT NULL DEFAULT now() ,
    executedAt DATETIME NULL ,
    PRIMARY KEY (id));",
        );
    }

    public function down(): void
    {
        $this->db->connect()->query("DROP TABLE IF EXISTS tasks;");
    }
}