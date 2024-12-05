<?php
$connection = new mysqli("mysql-8.2", "root", "", "store_db");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sqlCreateTableClients = "CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(250),
    first_name VARCHAR(250),
    middle_name VARCHAR(250),
    postal_code INT,
    country VARCHAR(100),
    city VARCHAR(100),
    street VARCHAR(100),
    building VARCHAR(50),
    phone VARCHAR(30),
    email VARCHAR(250)
)";
$connection->query($sqlCreateTableClients);

$sqlCreateTableFilms = "CREATE TABLE IF NOT EXISTS films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500),
    release_year INT,
    director VARCHAR(250),
    duration VARCHAR(50)
)";
$connection->query($sqlCreateTableFilms);

$connection->query("CREATE TABLE IF NOT EXISTS genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
)");
$connection->query("CREATE TABLE IF NOT EXISTS movie_genres (
    movie_id INT NOT NULL,
    genre_id INT NOT NULL,
    PRIMARY KEY (movie_id, genre_id),
    FOREIGN KEY (movie_id) REFERENCES films(id) ON DELETE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE CASCADE
)");

$connection->query("CREATE TABLE IF NOT EXISTS actors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL UNIQUE
)");
$connection->query("CREATE TABLE IF NOT EXISTS movie_actors (
    movie_id INT NOT NULL,
    actor_id INT NOT NULL,
    PRIMARY KEY (movie_id, actor_id),
    FOREIGN KEY (movie_id) REFERENCES films(id) ON DELETE CASCADE,
    FOREIGN KEY (actor_id) REFERENCES actors(id) ON DELETE CASCADE
)");

$sqlCreateTableStudents = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(250),
    group_name VARCHAR(100),
    birth_date DATE,
    address VARCHAR(250),
    phone VARCHAR(30),
    email VARCHAR(250)
)";
$connection->query($sqlCreateTableStudents);

echo "Tables created successfully.<br>";

$sqlInsertClients = "INSERT INTO clients (last_name, first_name, middle_name, postal_code, country, city, street, building, phone, email) VALUES
    ('Smith', 'John', 'Michael', 101000, 'USA', 'New York', 'Broadway', '101', '123-456-7890', 'john.smith@example.com')";
$connection->query($sqlInsertClients);

$sqlInsertFilms = "INSERT INTO films (title, release_year, director, duration) VALUES
    ('Inception', 2010, 'Christopher Nolan', '2h 28m')";
$connection->query($sqlInsertFilms);

$connection->query("INSERT INTO genres (name) VALUES ('Sci-Fi')");
$connection->query("INSERT INTO movie_genres (movie_id, genre_id) VALUES (1, 1)");

$connection->query("INSERT INTO actors (name) VALUES ('Leonardo DiCaprio')");
$connection->query("INSERT INTO movie_actors (movie_id, actor_id) VALUES (1, 1)");

$sqlInsertStudents = "INSERT INTO students (full_name, group_name, birth_date, address, phone, email) VALUES
    ('Alice Johnson', 'CS101', '2000-05-15', '123 Maple St, Boston', '123-456-7890', 'alice.johnson@example.com')";
$connection->query($sqlInsertStudents);

$connection->close();
?>