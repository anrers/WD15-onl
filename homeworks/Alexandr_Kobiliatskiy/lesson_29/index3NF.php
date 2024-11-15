<?php
//Третья нормальная форма
//Таблица должна быть во второй нормальной форме
//Все колонки в таблице зависят от первичного ключа и не зависят друг от друга

require_once 'index.php';

//Рассмотрим таблицу "Ученики" с полями: "ID ученика", "Имя
//ученика", "Класс", "ID учителя", "Имя учителя". Приведите таблицу к
//3НФ.

//Приведение к третьей форме
$sqlCreateTableClasses = "CREATE TABLE Classes (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Description VARCHAR(500))";
$sqlCreateTableTeachers = "CREATE TABLE Teachers (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Adress VARCHAR(250), Phone VARCHAR(250), Email VARCHAR(250))";

$sqlCreateTableStudents = "CREATE TABLE Students (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(250),
    Class_id INTEGER, 
    Teacher_id INTEGER,
    FOREIGN KEY (Class_id) REFERENCES Classes (id) ON DELETE SET NULL,
    FOREIGN KEY (Teacher_id) REFERENCES Teachers (id) ON DELETE SET NULL)";