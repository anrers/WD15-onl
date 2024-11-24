<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study"
);


//Рассмотрим таблицу "Ученики" с полями: "ID ученика", "Имя
//ученика", "Класс", "ID учителя", "Имя учителя". Приведите таблицу к 3НФ

$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS teachers (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS class (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(5) NOT NULL,
    )
");


$connection->query("
    CREATE TABLE IF NOT EXISTS lessons (
        teacherID INT NOT NULL,
        studentID INT NOT NULL,
        classID INT NOT NULL,
        PRIMARY KEY (teacherID, studentID, classID),
        FOREIGN KEY (studentID) REFERENCES students(id),
        FOREIGN KEY (teacherID) REFERENCES teachers(id),
        FOREIGN KEY (classID) REFERENCES class(id)
    )
");