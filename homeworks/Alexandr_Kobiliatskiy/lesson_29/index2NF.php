<?php
//Вторая нормальная форма
//Таблица должна быть в первой нормальной форме
//Все неключевые атрибуты таблицы должны зависеть от первичного ключа

require_once 'index.php';


// Рассмотрим таблицу с информацией о книгах, включающую
//столбцы: "Название книги", "Автор", "Жанр", "Издательство", "Год
//издания". Определите, в каких случаях нарушается 2НФ, и
//приведите решение для приведения таблицы к 2НФ.

//Приведение ко второй форме
$sqlCreateTableAuthor = "CREATE TABLE Authors (id INTEGER AUTO_INCREMENT PRIMARY KEY, full_name VARCHAR(500))";
$sqlCreateTableGenre = "CREATE TABLE Genries (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250))";
$sqlCreateTablePublishing = "CREATE TABLE Publishing (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), adress VARCHAR(250), phone VARCHAR(250), email VARCHAR(250))";

$sqlCreateTableBooks = "CREATE TABLE Books (
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    boors_name VARCHAR(500),
    author_id INTEGER,
    genre_id INTEGER,
    publishing_id INTEGER,
    year_published INTEGER,
    FOREIGN KEY (author_id) REFERENCES Authors (id) ON DELETE SET NULL,
    FOREIGN KEY (genre_id) REFERENCES Genries (id) ON DELETE SET NULL,
    FOREIGN KEY (publishing_id) REFERENCES Publishing (id) ON DELETE SET NULL)";



//Предположим, что у нас есть таблица с информацией о транзакциях
//в банке, которая включает в себя следующие столбцы: "ID
//транзакции", "ID клиента", "Имя клиента", "Номер счета", "Банк",
//"Сумма транзакции". Определите, в каких случаях нарушается 2НФ,
//и приведите решение для приведения таблицы к 2НФ.
// Ответ: Имя клиента лишнее.... Банк заменить на столбец с внешним ключом

//Приведение ко второй форме
$sqlCreateTableBanks = "CREATE TABLE Banks (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), adress VARCHAR(250), phone VARCHAR(250), email VARCHAR(250))";
$sqlCreateTableClients = "CREATE TABLE Clients (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), adress VARCHAR(250), phone VARCHAR(250), email VARCHAR(250))";

$sqlCreateTableBooks = "CREATE TABLE Transactions (
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    client_id INTEGER,
    account_number INTEGER,
    bank_id INTEGER,
    summ DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Clients (id) ON DELETE SET NULL,
    FOREIGN KEY (bank_id) REFERENCES Banks (id) ON DELETE SET NULL)";


//Рассмотрим таблицу с информацией о продажах, которая включает
//в себя следующие столбцы: "ID продажи", "ID продукта", "Название
//продукта", "Описание продукта", "ID клиента", "Имя клиента",
//"Сумма продажи". Определите, в каких случаях нарушается 2НФ, и
//приведите решение для приведения таблицы к 2НФ.
//Ответ: "Название продукта", "Описание продукта" и "Имя клиента" в этой таблице лишние

//Приведение ко второй форме
$sqlCreateTableProducts = "CREATE TABLE Products (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), description VARCHAR(500))";
$sqlCreateTableClients = "CREATE TABLE Clients (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(250), adress VARCHAR(250), phone VARCHAR(250), email VARCHAR(250))";

$sqlCreateTableSales = "CREATE TABLE Sales (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    sales_number INTEGER, 
    product_id INTEGER, 
    client_id INTEGER,
    summ DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Clients (id) ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES Products (id) ON DELETE SET NULL)";
//sales_number одинаковый для всех продуктов, в рамках одной покупки.
