<?php

require_once 'DocumentInterface.php';

class VideoDocument implements DocumentInterface 
{
    public function __construct(
        private string $title,
        private string $description,
        private string $duration,
    ) {
    }

    public function process(): void 
    {
        echo "Обрабатывается " . $this->title . ' Document' . PHP_EOL;
    }
    
    public function getInfo(): array 
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->getDuration(),
        ];
    }
    
    public function getTitle(): string 
    {
        return $this->title;
    }
    
    public function getDescription(): string 
    {
        return $this->description;
    }
    
    public function getDuration(): string 
    {
        return $this->duration;
    }
}