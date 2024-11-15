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
$sqlCreateTableAuthor = "CREATE TABLE Authors (id INTEGER AUTO_INCREMENT PRIMARY KEY, Full_name VARCHAR(500))";
$sqlCreateTableGenre = "CREATE TABLE Genries (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250))";
$sqlCreateTablePublishing = "CREATE TABLE Publishing (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Adress VARCHAR(250), Phone VARCHAR(250), Email VARCHAR(250))";

$sqlCreateTableBooks = "CREATE TABLE Books (
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    Boors_name VARCHAR(500),
    Author_id INTEGER,
    Genre_id INTEGER,
    Publishing_id INTEGER,
    Year_published INTEGER,
    FOREIGN KEY (Author_id) REFERENCES Authors (id) ON DELETE SET NULL,
    FOREIGN KEY (Genre_id) REFERENCES Genries (id) ON DELETE SET NULL,
    FOREIGN KEY (Publishing_id) REFERENCES Publishing (id) ON DELETE SET NULL)";



//Предположим, что у нас есть таблица с информацией о транзакциях
//в банке, которая включает в себя следующие столбцы: "ID
//транзакции", "ID клиента", "Имя клиента", "Номер счета", "Банк",
//"Сумма транзакции". Определите, в каких случаях нарушается 2НФ,
//и приведите решение для приведения таблицы к 2НФ.
// Ответ: Имя клиента лишнее.... Банк заменить на столбец с внешним ключом

//Приведение ко второй форме
$sqlCreateTableBanks = "CREATE TABLE Banks (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Adress VARCHAR(250), Phone VARCHAR(250), Email VARCHAR(250))";
$sqlCreateTableClients = "CREATE TABLE Clients (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Adress VARCHAR(250), Phone VARCHAR(250), Email VARCHAR(250))";

$sqlCreateTableBooks = "CREATE TABLE Transactions (
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    Client_id INTEGER,
    Account_number INTEGER,
    Bank_id INTEGER,
    Summ DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (Client_id) REFERENCES Clients (id) ON DELETE SET NULL,
    FOREIGN KEY (Bank_id) REFERENCES Banks (id) ON DELETE SET NULL)";


//Рассмотрим таблицу с информацией о продажах, которая включает
//в себя следующие столбцы: "ID продажи", "ID продукта", "Название
//продукта", "Описание продукта", "ID клиента", "Имя клиента",
//"Сумма продажи". Определите, в каких случаях нарушается 2НФ, и
//приведите решение для приведения таблицы к 2НФ.
//Ответ: "Название продукта", "Описание продукта" и "Имя клиента" в этой таблице лишние

//Приведение ко второй форме
$sqlCreateTableProducts = "CREATE TABLE Products (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Description VARCHAR(500))";
$sqlCreateTableClients = "CREATE TABLE Clients (id INTEGER AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(250), Adress VARCHAR(250), Phone VARCHAR(250), Email VARCHAR(250))";

$sqlCreateTableSalies = "CREATE TABLE Salies (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    Product_id INTEGER, 
    Client_id INTEGER,
    Summ DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (Client_id) REFERENCES Clients (id) ON DELETE SET NULL,
    FOREIGN KEY (Product_id) REFERENCES Products (id) ON DELETE SET NULL)";