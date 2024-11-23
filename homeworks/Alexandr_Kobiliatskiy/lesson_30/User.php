<?php
class User
{
    public $objectId;
    public function __construct(
        public string $name,
        public string $email,
        public $conn,

    ) {}
    public function create(): int | string
    {
        $create = $this->conn->prepare("INSERT INTO students (name, email) VALUES ('$this->name', '$this->email');");
        $create->execute();
//
        $getIdThisObject = $this->conn->prepare("SELECT MAX(id) FROM students"); //Тут корявенько, но истории типа "LAST_INSERT_ID()" возвращают ноль
        $getIdThisObject->execute();
        $this->objectId = $getIdThisObject->fetchColumn(); //Эту штуку IDE мне сама написала - работает....
        return $this->objectId;
    }

    public function update(string $name, string $email): void
    {
        $update = $this->conn->prepare("UPDATE students SET name = '$name', email = '$email' WHERE id = :id");
        $update->execute([':id' => $this->objectId]);

    }

    public function read(): void
    {
        $read = $this->conn->prepare("SELECT * FROM students  WHERE id = :id");
        $read->execute([':id' => $this->objectId]);
        echo json_encode($read->fetch(PDO::FETCH_ASSOC));

    }

    public function delete(): void
    {
        $delete = $this->conn->prepare("DELETE FROM students WHERE id = :id");
        $delete->execute([':id' => $this->objectId]);

    }
}