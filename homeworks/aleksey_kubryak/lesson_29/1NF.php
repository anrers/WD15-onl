<?php

$connection = new mysqli(
    "mysql-8.2",
    "root",
    "",
    "study",
);

/* 1. Таблица для хранения информации о клиентах магазина */
$connection->query("
    CREATE TABLE IF NOT EXISTS customers (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        address VARCHAR(255),
        email VARCHAR(100) UNIQUE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS customers_phones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customers_id INT,
        phone VARCHAR(20),
        FOREIGN KEY (customers_id) REFERENCES customers(id) ON DELETE CASCADE
    )
");

/* 2. Таблица для хранения информации о фильмах */
$connection->query("
    CREATE TABLE IF NOT EXISTS movies (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        release_year INT(4),
        director VARCHAR(100),
        duration INT
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS genres (
        id INT PRIMARY KEY AUTO_INCREMENT,
        genre VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS actors (
        id INT PRIMARY KEY AUTO_INCREMENT,
        actor VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS movie_genres (
        movie_id INT,
        genre_id INT,
        PRIMARY KEY (movie_id, genre_id),
        FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE CASCADE,
        FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS movie_actors (
        movie_id INT,
        actor_id INT,
        PRIMARY KEY (movie_id, actor_id),
        FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
        FOREIGN KEY (actor_id) REFERENCES actors(id) ON DELETE CASCADE
    )
");

/* 3. Таблица для хранения информации о студентах */
$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        number INT PRIMARY KEY UNIQUE,
        full_name VARCHAR(255) NOT NULL,
        birth_date DATE,
        address VARCHAR(255),
        email VARCHAR(100) UNIQUE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS groups (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS student_groups (
        student_number INT(11),
        group_id INT(11),
        PRIMARY KEY (student_number, group_id),
        FOREIGN KEY (student_number) REFERENCES students(number) ON DELETE CASCADE,
        FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS student_phones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_number INT(11),
        phone VARCHAR(20),
        FOREIGN KEY (student_number) REFERENCES students(number) ON DELETE CASCADE
    )
");

$connection->close();