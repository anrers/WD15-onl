<?php
//Первая нормальная форма:
//Каждая ячейка таблицы может хранить только одно значение
//Все данные в одной колонке могут быть только одного типа
//Каждая запись в таблице должна однозначно отличаться от других записей (реализуется через id)

global $connection;  //я не понял почему оно так хочет.....
require_once 'index.php';


//Создаем таблицы 1НФ и вставим в них чего-нибудь
$sqlCreateTableClients = "CREATE TABLE  Clients (id INTEGER AUTO_INCREMENT PRIMARY KEY, Full_name VARCHAR(250), 
Adress VARCHAR(250), Phone VARCHAR(30), Email VARCHAR(250))";

if ($connection->query($sqlCreateTableClients) === TRUE) {
    echo "Table Clients created successfully" . "<br>";
} else {
    echo "Error creating table: " . $connection->error;
}

$sqlInsertClients = "INSERT INTO Clients (Full_name, Adress, Phone, Email) VALUE 
    ('Иванов Иван Иванович', 'Москва, ул.Ленина дом 15', '353782', 'ivanov@mail.ru'),
    ('Сергеев Сергей Сергеевич', 'Россия, г. Москва, ул.Ленина дом 15', '353782', 'sergeev@mail.ru'),
    ('Петров Иван Павлович', 'ул.Ленина дом 151', '8(395)245-15-48', 'petrov@mail.ru'),
    ('Иванов Семен Иванович', 'Москва, ул.Ленина дом 22', '8-912-353-78-27', 'ivanov2@mail.ru')";

if ($connection->query($sqlInsertClients) === TRUE) {
    echo "Данные клиентов магазина добавлены" . "<br>";
} else {
    echo "Данные клиентов магазина не добавлены: " . $connection->error;
}

$sqlCreateTableFilms = "CREATE TABLE  Films (id INTEGER AUTO_INCREMENT PRIMARY KEY, Films_name VARCHAR(500), 
year_of_manufacture INTEGER, Genre VARCHAR(250), Director VARCHAR(250), Main_actors VARCHAR(250), Duration VARCHAR(250))";

if ($connection->query($sqlCreateTableFilms) === TRUE) {
    echo "Table Films created successfully" . "<br>";
} else {
    echo "Error creating table: " . $connection->error;
}

$sqlInsertFilms = "INSERT INTO Films (Films_name, year_of_manufacture, Genre, Director, Main_actors, Duration) VALUE 
    ('1+1', '2011', 'драма', 'Оливье Накаш', 'Франсуа Клюзе', '1 ч 52 мин'),
    ('1+1', '2011', 'драма', 'Оливье Накаш', 'Омар Си', '1 ч 52 мин'),
    ('1+1', '2011', 'драма', 'Эрик Толедано', 'Франсуа Клюзе', '1 ч 52 мин'),
    ('1+1', '2011', 'драма', 'Эрик Толедано', 'Омар Си', '1 ч 52 мин'),
    ('1+1', '2011', 'комедия', 'Оливье Накаш', 'Франсуа Клюзе', '1 ч 52 мин'),
    ('1+1', '2011', 'комедия', 'Оливье Накаш', 'Омар Си', '1 ч 52 мин'),
    ('1+1', '2011', 'комедия', 'Эрик Толедано', 'Франсуа Клюзе', '1 ч 52 мин'),
    ('1+1', '2011', 'комедия', 'Эрик Толедано', 'Омар Си', '1 ч 52 мин'),
    ('Interstellar', '2014', 'фантастика', 'Кристофер Нолан', 'Мэттью Макконахи', '2 ч 49 мин'),
    ('Interstellar', '2014', 'фантастика', 'Кристофер Нолан', 'Энн Хэтэуэй', '2 ч 49 мин'),
    ('Interstellar', '2014', 'драма', 'Кристофер Нолан', 'Мэттью Макконахи', '2 ч 49 мин'),
    ('Interstellar', '2014', 'драма', 'Кристофер Нолан', 'Энн Хэтэуэй', '2 ч 49 мин'),
    ('Interstellar', '2014', 'приключения', 'Кристофер Нолан', 'Мэттью Макконахи', '2 ч 49 мин'),
    ('Interstellar', '2014', 'приключения', 'Кристофер Нолан', 'Энн Хэтэуэй', '2 ч 49 мин')";
//Вот здесь первая нормальная группа расцветает во всей красе......

if ($connection->query($sqlInsertFilms) === TRUE) {
    echo "Фильмы успешно добавлены" . "<br>";
} else {
    echo "Фильмы успешно не добавлены: " . $connection->error;
}


$sqlCreateTableStudents = "CREATE TABLE  Students (id INTEGER AUTO_INCREMENT PRIMARY KEY, Full_name VARCHAR(250), 
Group VARCHAR(250), Date_of_birth DATE, Adress VARCHAR(250), Phone VARCHAR(30), Email VARCHAR(250))";


if ($connection->query($sqlCreateTableStudents) === TRUE) {
    echo "Table Students created successfully" . "<br>";
} else {
    echo "Error creating table: " . $connection->error;
}

$sqlInsertStudents = "INSERT INTO Students (Full_name, Group, Date_of_birth, Adress, Phone, Email) VALUE 
    ('Иванов Семен Иванович', 'WD785-26', '1988-11-25', 'Москва, ул.Ленина дом 116', '8(395)245-15-48', 'ivanov22@mail.ru'),
    ('Павлов Петр Иванович', 'WD785-26', '1988-10-28', 'Москва, ул.Тверская дом 16', '8-(395)-242-15-43', 'pavlov@mail.ru'),
    ('Сидоров Сидор', 'WD785-26', '1989-04-28', 'Тюмень, ул.Пермякова дом 1', '8-982-168-46-15', 'sidorov@mail.ru')";

if ($connection->query($sqlInsertStudents) === TRUE) {
    echo "Студенты успешно добавлены" . "<br>";
} else {
    echo "Студенты успешно не добавлены: " . $connection->error;
}

$connection->close();

