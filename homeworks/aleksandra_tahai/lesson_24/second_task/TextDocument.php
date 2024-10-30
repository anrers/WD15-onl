<?php
require_once 'DocumentInterface.php';

class TextDocument implements DocumentInterface
{
    public function __construct(
        protected string $title,
        protected string $description,
        protected string $content
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function open(): void
    {
        echo "this type in process! ";
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'word_count' => $this->getWordCount(),
        ];

    }

    public function getWordCount()
    {
        return str_word_count($this->content);
    }
}