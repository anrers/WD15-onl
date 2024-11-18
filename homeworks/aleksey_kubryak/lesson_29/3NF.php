<?php

$connection = new mysqli(
    "mysql-8.2",
    "root",
    "",
    "study",
);

// Рассмотрим таблицу "Ученики" с полями: "ID ученика", "Имя ученика", "Класс", "ID учителя", "Имя учителя". Приведите таблицу к 3НФ.
$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        class_id INT NOT NULL,
        teachers_id INT NOT NULL,
        FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
        FOREIGN KEY (teachers_id) REFERENCES teachers(id) ON DELETE CASCADE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS classes (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS teachers (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL
    )
");

$connection->close();