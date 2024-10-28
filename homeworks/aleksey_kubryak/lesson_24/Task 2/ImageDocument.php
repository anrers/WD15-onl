<?php

require_once 'DocumentInterface.php';

class ImageDocument implements DocumentInterface 
{
    public function __construct(
        private string $title,
        private string $description,
        private string $width,
        private string $height,
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
            'dimensions' => $this->getDimensions(),
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
    
    public function getDimensions(): string 
    {
        return "{$this->width} x {$this->height}";
    }
}