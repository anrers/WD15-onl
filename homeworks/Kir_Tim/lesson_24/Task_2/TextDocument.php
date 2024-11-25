<?php

require_once 'DocumentInterface.php';

class TextDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private string $count
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

    public function getWordCount(): int
    {
        return str_word_count($this->count);
    }

    public function process(): void
    {
        echo "Обработка текста";
    }

    public function getInfo(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'wordCount' => $this->count,
        ];
    }
}