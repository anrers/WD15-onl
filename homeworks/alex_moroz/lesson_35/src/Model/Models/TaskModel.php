<?php

namespace Morozav\Lesson35\Model\Models;

use DateTime;

class TaskModel
{
    private ?int $id;
    private string $name;
    private ?string $description;
    private int $status;
    private string $deadline;
    private string $createdAt;
    private ?string $executedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description ?? '';
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getDeadline(): DateTime
    {
        return new DateTime($this->deadline);
    }

    public function setDeadline(string $deadline): void
    {
        $this->deadline = $deadline;
    }

    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->createdAt);
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getExecutedAt(): DateTime
    {
        return new DateTime($this->executedAt);
    }

    public function setExecutedAt(string $executedAt): void
    {
        $this->executedAt = $executedAt;
    }
}