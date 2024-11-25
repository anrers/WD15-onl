<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study");


//Вторая нормальная форма:
//таблицы должна находится в 1НФ, таблица должна иметь ключ,
// все неключевые столбцы таблицы должны зависеть от полного ключа (если ключ составной)


//Рассмотрим таблицу с информацией о книгах, включающую
//столбцы: "Название книги", "Автор", "Жанр", "Издательство", "Год
//издания". Определите, в каких случаях нарушается 2НФ, и
//приведите решение для приведения таблицы к 2НФ.

$connection->query("CREATE TABLE IF NOT EXISTS books (
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(30) NOT NULL,
                            year VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS editors (
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS editorsBooks (
                           idBook INT NOT NULL,
                           idEditor INT NOT NULL,
                           FOREIGN KEY (idEditor) REFERENCES editors(id),
                           FOREIGN KEY (idBook) REFERENCES books(id))");

//несколько авторов
$connection->query("CREATE TABLE IF NOT EXISTS authors (
                             authorId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             name VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS authorsOfBooks (
                             bookId INT NOT NULL,
                             authorId INT NOT NULL,
                             primary KEY (bookId, authorId),
                             FOREIGN KEY (bookId) REFERENCES books(id),
                             FOREIGN KEY (authorId) REFERENCES authors(id))");

//несколько жанров
$connection->query("CREATE TABLE IF NOT EXISTS genres (
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS genresOfBooks (
                             bookId INT NOT NULL,
                             genreId INT NOT NULL,
                             primary KEY (bookId, genreId),
                             FOREIGN KEY (bookId) REFERENCES books(id),
                             FOREIGN KEY (genreId) REFERENCES genres(id))");

//Предположим, что у нас есть таблица с информацией о транзакциях
//в банке, которая включает в себя следующие столбцы: "ID
//транзакции", "ID клиента", "Имя клиента", "Номер счета", "Банк",
//"Сумма транзакции". Определите, в каких случаях нарушается 2НФ,
//и приведите решение для приведения таблицы к 2НФ.

$connection->query("CREATE TABLE IF NOT EXISTS transactions (
                             id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             accountId INT NOT NULL,
                             sumTransaction DOUBLE PRECISION NOT NULL,
                             FOREIGN KEY (accountId) REFERENCES accounts(id))");

//клиенты
$connection->query("CREATE TABLE IF NOT EXISTS clients (
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(30) NOT NULL)");

//счёта - несколько у одного клиента в разных банках
$connection->query("CREATE TABLE IF NOT EXISTS accounts (
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            clientId INT NOT NULL,
                            bankId INT NOT NULL,
                            FOREIGN KEY (clientId) REFERENCES clients(id),
                            FOREIGN KEY (bankId) REFERENCES banks(id))");

$connection->query("CREATE TABLE IF NOT EXISTS banks (
                             id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             name VARCHAR(30) NOT NULL)");

//Рассмотрим таблицу с информацией о продажах, которая включает
//в себя следующие столбцы: "ID продажи", "ID продукта", "Название
//продукта", "Описание продукта", "ID клиента", "Имя клиента",
//"Сумма продажи". Определите, в каких случаях нарушается 2НФ, и
//приведите решение для приведения таблицы к 2НФ

//клиенты с несколькими заказами
$connection->query("CREATE TABLE IF NOT EXISTS clients(
                             clientId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             name VARCHAR(30) NOT NULL,
                             phone VARCHAR(30) NOT NULL,
                             email VARCHAR(30) NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS products(
                            productId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(30) NOT NULL,
                            description VARCHAR(30) NOT NULL,
                            price INT NOT NULL)");

$connection->query("CREATE TABLE IF NOT EXISTS orders(
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            clientId INT NOT NULL,
                            date DATE NOT NULL, 
                            FOREIGN KEY (clientId) REFERENCES clients(id),
                            FOREIGN KEY (productId) REFERENCES products(id))");

$connection->query("CREATE TABLE IF NOT EXISTS ordersItems(
                            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            orderId INT NOT NULL,
                            productId INT NOT NULL,
                            quantity INT NOT NULL,
                            FOREIGN KEY (productId) REFERENCES products(id),
                            FOREIGN KEY (orderId) REFERENCES orders(id))");
