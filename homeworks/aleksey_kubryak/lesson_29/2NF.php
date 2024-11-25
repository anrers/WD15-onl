<?php

$connection = new mysqli(
    "mysql-8.2",
    "root",
    "",
    "study",
);

/* 1. Таблица для хранения информации о книгах */
$connection->query("
    CREATE TABLE IF NOT EXISTS authors (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS genres (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS publishers (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS books (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(200) NOT NULL,
        author_id INT NOT NULL,
        genre_id INT NOT NULL,
        publisher_id INT NOT NULL,
        year_published INT,
        FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE,
        FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE CASCADE,
        FOREIGN KEY (publisher_id) REFERENCES publishers(id) ON DELETE CASCADE
    )
");

/* 2. Таблица для хранения информации о транзакциях в банке */
$connection->query("
    CREATE TABLE IF NOT EXISTS banks (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS clients (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        account_number VARCHAR(20) NOT NULL,
        bank_id INT NOT NULL,
        FOREIGN KEY (bank_id) REFERENCES banks(id) ON DELETE CASCADE
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS transactions (
        id INT PRIMARY KEY AUTO_INCREMENT,
        client_id INT NOT NULL,
        value DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
    )
");

/* 3. Таблица для хранения информации о продажах */
$connection->query("
    CREATE TABLE IF NOT EXISTS clients (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        description TEXT NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS sales (
        id INT PRIMARY KEY AUTO_INCREMENT,
        product_id INT NOT NULL,
        client_id INT NOT NULL,
        sale_amount DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
        FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
    )
");

$connection->close();