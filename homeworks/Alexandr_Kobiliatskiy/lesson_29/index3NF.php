<?php
//Третья нормальная форма
//Таблица должна быть во второй нормальной форме
//Все колонки в таблице зависят от первичного ключа и не зависят друг от друга

require_once 'index.php';

//Рассмотрим таблицу "Ученики" с полями: "ID ученика", "Имя
//ученика", "Класс", "ID учителя", "Имя учителя". Приведите таблицу к
//3НФ.

//Приведение к третьей форме
$sqlCreateTableClasses = "CREATE TABLE Classes (
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(250), 
    description VARCHAR(500),
    teacher_id INTEGER,
    FOREIGN KEY (teacher_id) REFERENCES Teachers (id) ON DELETE SET NULL));";
$sqlCreateTableTeachers = "CREATE TABLE Teachers (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), adress VARCHAR(250), phone VARCHAR(250), email VARCHAR(250))";
$sqlCreateTableStudents = "CREATE TABLE Students (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), adress VARCHAR(250), phone VARCHAR(250), email VARCHAR(250),";
$sqlCreateTableVisitingClasses = "CREATE TABLE Visiting (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    class_id INTEGER,
    students_id INTEGER,
    FOREIGN KEY (class_id) REFERENCES Classes (id) ON DELETE SET NULL, 
    FOREIGN KEY (students_id) REFERENCES Students (id) ON DELETE SET NULL 
    )";