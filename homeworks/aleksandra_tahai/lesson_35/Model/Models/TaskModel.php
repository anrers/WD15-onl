<?php

namespace Model\Models;

use DateTime;

class TaskModel
{

    public function __construct(
        private ?int $id,
        private string $name,
        private DateTime $dueDate,
        private int $status,
        private DateTime $createAt,
        private ?DateTime $executedAt = null,
        private ?string $description = null,
    ) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    public function getStatus(): string
    {

        $status = $this->status;

        $resultStatus = match ($status) {
            0 => 'In process!',
            1 => 'Completed!',
            2 => 'Expired :(',
            default => 'Error'
        };
        return $resultStatus;
    }

    public function getStatusInt(){
        return $this->status;
    }

    public function getCreateAt(): DateTime
    {
        return $this->createAt;
    }

    public function getExecutedAt(): ?DateTime
    {
        return $this->executedAt;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getDaysRemaining()
    {
        $todayDay = new DateTime();
        $diff = $todayDay->diff($this->dueDate)->format('%R%a days');
        return $diff;
    }

}


