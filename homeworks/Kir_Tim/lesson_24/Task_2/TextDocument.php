<?php

require_once 'DocumentInterface.php';

class TextDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private string $count
    )
    {
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getWordCount()
    {
        return str_word_count($this->count);
    }

    public function process()
    {
        echo "Обработка текста";
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'wordCount' => $this->count,
        ];
    }
}