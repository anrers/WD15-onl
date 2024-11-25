<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study");


//Первая нормальная форма БД:
//не должно быть дублирующих строк, атомарное значение каждой ячейки,
// в столбцах хранятся данные одного типа, отсутствуют массивы и списки в любом виде

//Разработать таблицу для хранения информации о клиентах
//магазина, включающую поля: ID клиента, ФИО, адрес, телефон,
//электронная почта. Учитывайте, что ФИО может содержать
//несколько слов и телефон может быть записан в разных форматах.

$connection->query("CREATE TABLE IF NOT EXISTS customers (
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              firstName VARCHAR(60) NOT NULL,
                              lastName VARCHAR(60) NOT NULL,
                              address VARCHAR(60) NOT NULL,
                              email VARCHAR(50) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS customerPhones (
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              idCustomer INT NOT NULL ,
                              phone VARCHAR(30) NOT NULL,
                              FOREIGN KEY (idCustomer) REFERENCES customers(id))");


//Создать таблицу для хранения информации о фильмах: ID фильма,
//название фильма, год выпуска, жанр, режиссер, главный актер,
//продолжительность. При создании таблицы необходимо учитывать,
//что один фильм может иметь несколько жанров и нескольких
//актеров.
$connection->query("CREATE TABLE IF NOT EXISTS films (
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              name VARCHAR(30) NOT NULL,
                              producer VARCHAR(30) NOT NULL,
                              duration int NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS genres (
                              id INT PRIMARY KEY AUTO_INCREMENT,
                              genre VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS filmGenres (
                              filmId INT,
                              genreId INT,
                              PRIMARY KEY(filmId, genreId);
                              FOREIGN KEY (filmId) REFERENCES films(id),
                              FOREIGN KEY (genreId) REFERENCES genres(id))");

$connection->query("CREATE TABLE IF NOT EXISTS actors ( 
                              id INT NOT NULL,
                              name VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS filmActors (
                               filmId INT,
                               actorId INT,
                               PRIMARY KEY(filmId, actorId),
                               FOREIGN KEY (filmId) REFERENCES films(id),
                               FOREIGN KEY (actorId) REFERENCES actors(id))");


// Разработать таблицу для хранения информации о студентах: номер
//студента, ФИО, группа, дата рождения, адрес, телефон, email.
//Учесть, что группа может содержать несколько студентов и телефон
//может быть записан в разных форматах.

$connection->query("CREATE TABLE IF NOT EXISTS students (
                              id INT NOT NULL PRIMARY KEY,
                              name VARCHAR(30) NOT NULL,
                              dateOfBirth DATE  NOT NULL,
                              address VARCHAR(20) NOT NULL,
                              email VARCHAR(50) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS classes ( 
                              id INT NOT NULL PRIMARY KEY,
                              name VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS studentsClasses (
                              idStudent INT,
                              idClass INT,
                              PRIMARY KEY(idStudent, idClass),
                              FOREIGN KEY (idStudent) REFERENCES students(id),
                              FOREIGN KEY (idClass) REFERENCES classes(id))");

$connection->query("CREATE TABLE IF NOT EXISTS studentPhones (
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              idStudent INT NOT NULL ,
                              phone VARCHAR(30) NOT NULL,
                              FOREIGN KEY (idStudent) REFERENCES students(id))");