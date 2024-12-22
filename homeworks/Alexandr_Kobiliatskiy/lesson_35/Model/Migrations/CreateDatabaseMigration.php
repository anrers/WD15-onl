<?php

namespace Model\Migrations;

use Model\Database;

class CreateDatabaseMigration
{
    public function __construct(
        protected Database $db
    ) {}

    public function createDataBase(): void
    {
        $this->db->connectionToMySqlServer()->query("CREATE DATABASE IF NOT EXISTS `testMVC`");
    }

    public function dropDataBase(): void
    {
        $this->db->connectionToMySqlServer()->query("DROP DATABASE IF EXISTS `testMVC`");
    }
}



