<?php
class User
{
    public $objectId;
    public function __construct(
        public string $name,
        public string $email,
        public $conn,

    ) {}
    public function create(): void
    {
        $create = $this->conn->prepare("INSERT INTO students (name, email) VALUES ('$this->name', '$this->email');");
        $create->execute();
        $this->objectId = $this->conn->lastInsertId();
    }
    public function update(string $name, string $email): void
    {
        $update = $this->conn->prepare("UPDATE students SET name = '$name', email = '$email' WHERE id = :id");
        $update->execute([':id' => $this->objectId]);
    }
    public function read(): string
    {
        $read = $this->conn->prepare("SELECT * FROM students  WHERE id = :id");
        $read->execute([':id' => $this->objectId]);
        return json_encode($read->fetchAll(PDO::FETCH_ASSOC));
    }
    public function delete(): void
    {
        $delete = $this->conn->prepare("DELETE FROM students WHERE id = :id");
        $delete->execute([':id' => $this->objectId]);
    }
}