<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/models/CreateTables.php';
require_once __DIR__ . '/models/SecondNF.php';
require_once __DIR__ . '/models/ThirdNF.php';

use Models\CreateTables;
use Models\SecondNF;
use Models\ThirdNF;

// Подключение к базе данных
$config = require __DIR__ . '/config.php';
$connection = new mysqli(
    $config['db']['host'],
    $config['db']['user'],
    $config['db']['password'],
    $config['db']['dbname']
);

// Создание таблиц (1НФ)
$tables = new CreateTables($connection);
$tables->createCustomersTable();
$tables->createMoviesTable();
$tables->createStudentsTable();

// Приведение таблиц ко 2НФ
$secondNF = new SecondNF($connection);
$secondNF->normalizeBooksTable();
$secondNF->normalizeTransactionsTable();
$secondNF->normalizeSalesTable();

// Приведение таблицы "Ученики" к 3НФ
$thirdNF = new ThirdNF($connection);
$thirdNF->normalizeStudentsTable();
