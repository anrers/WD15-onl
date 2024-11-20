<?php

namespace Models;

use mysqli;

class SecondNF
{
    private mysqli $db;

    public function __construct(mysqli $connection)
    {
        $this->db = $connection;
    }

    /*Таблица книг:
    Поля: Название книги, Автор, Жанр, Издательство, Год издания.
    Нарушение:
    Автор зависит только от Название книги, а не от всего ключа.
    Издательство зависит только от Название книги, а не от всего ключа.
    Решение:
    Разделить таблицу на три:
    authors (ID автора, имя).
    publishers (ID издательства, название).
    books (ID книги, название, ID автора, ID издательства, жанр, год издания).*/

    public function normalizeBooksTable(): void
    {
        $this->db->query("DROP TABLE IF EXISTS books, authors, publishers");

        $this->db->query("
            CREATE TABLE authors (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ");

        $this->db->query("
            CREATE TABLE publishers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ");

        $this->db->query("
            CREATE TABLE books (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                author_id INT,
                publisher_id INT,
                genre VARCHAR(50),
                release_year INT,
                FOREIGN KEY (author_id) REFERENCES authors(id),
                FOREIGN KEY (publisher_id) REFERENCES publishers(id)
            )
        ");
    }

    /*Таблица транзакций:
    Поля: ID транзакции, ID клиента, Имя клиента, Номер счета, Банк, Сумма транзакции.
    Нарушение:
    Имя клиента и Банк зависят только от ID клиента, а не от всего ключа ID транзакции.
    Решение:
    Разделить таблицу:
    clients (ID клиента, имя).
    banks (ID банка, название).
    accounts (ID клиента, номер счета, ID банка).
    transactions (ID транзакции, ID клиента, сумма транзакции).*/

    public function normalizeTransactionsTable(): void
    {
        $this->db->query("DROP TABLE IF EXISTS transactions, accounts, banks");

        $this->db->query("
            CREATE TABLE accounts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                client_id INT,
                account_number VARCHAR(20),
                bank_id INT,
                FOREIGN KEY (bank_id) REFERENCES banks(id)
            )
        ");

        $this->db->query("
            CREATE TABLE banks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ");

        $this->db->query("
            CREATE TABLE transactions (
                id INT AUTO_INCREMENT PRIMARY KEY,
                account_id INT,
                amount DECIMAL(10, 2),
                FOREIGN KEY (account_id) REFERENCES accounts(id)
            )
        ");
    }

    /*Таблица продаж:
    Поля: ID продажи, ID продукта, Название продукта, Описание продукта, ID клиента, Имя клиента, Сумма продажи.
    Нарушение:
    Название продукта и Описание продукта зависят только от ID продукта.
    Имя клиента зависит только от ID клиента.
    Решение:
    Разделить таблицу:
    clients (ID клиента, имя).
    products (ID продукта, название, описание).
    sales (ID продажи, ID продукта, ID клиента, сумма).*/

    public function normalizeSalesTable(): void
    {
        $this->db->query("DROP TABLE IF EXISTS sales, products, clients");

        $this->db->query("
            CREATE TABLE clients (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ");

        $this->db->query("
            CREATE TABLE products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255),
                description TEXT
            )
        ");

        $this->db->query("
            CREATE TABLE sales (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT,
                client_id INT,
                amount DECIMAL(10, 2),
                FOREIGN KEY (product_id) REFERENCES products(id),
                FOREIGN KEY (client_id) REFERENCES clients(id)
            )
        ");
    }
}
