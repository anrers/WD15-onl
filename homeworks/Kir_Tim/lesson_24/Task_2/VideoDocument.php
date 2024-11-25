<?php

require_once 'DocumentInterface.php';

class VideoDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private int    $duration
    ) {

    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function process(): void
    {
        echo "Обработка видео";
    }

    public function getInfo(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration,
        ];
    }
}