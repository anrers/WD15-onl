<?php

require_once 'DocumentInterface.php';

class TextDocument implements DocumentInterface 
{
    public function __construct(
        private string $title,
        private string $description,
        private string $content,
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
            'content' => $this->content,
            'word_count' => $this->getWordCount(),
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

    public function getWordCount(): int 
    {
        return str_word_count($this->content);
    }
}