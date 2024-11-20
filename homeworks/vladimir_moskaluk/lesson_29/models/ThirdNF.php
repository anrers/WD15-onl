<?php

namespace Models;

use mysqli;

class ThirdNF
{
    private mysqli $db;

    public function __construct(mysqli $connection)
    {
        $this->db = $connection;
    }

    public function normalizeStudentsTable(): void
    {
        $this->db->query("DROP TABLE IF EXISTS students, teachers");

        $this->db->query("
            CREATE TABLE teachers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ");

       /* Таблица "Ученики":
       Поля: ID ученика, Имя ученика, Класс, ID учителя, Имя учителя.
       Нарушение:
       Имя учителя зависит от ID учителя, который, в свою очередь, связан с учеником.
       Это транзитивная зависимость.
       Решение:
       Разделить таблицу:
       teachers (ID учителя, имя).
       students (ID ученика, имя ученика, класс, ID учителя).*/
       $this->db->query("
            CREATE TABLE students (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                class_name VARCHAR(50),
                teacher_id INT,
                FOREIGN KEY (teacher_id) REFERENCES teachers(id)
            )
        ");
    }
}
