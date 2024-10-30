<?php
require_once 'DocumentInterface.php';

class TextDocument implements DocumentInterface
{
    private string $title;
    private string $description;
    private int $wordCount;

    public function __construct($title, $description, $wordCount)
    {
        $this->title = $title;
        $this->description = $description;
        $this->wordCount = $wordCount;
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
        return $this->wordCount;
    }

    public function process()
    {
        echo "Processing Text Document...\n";
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'wordCount' => $this->wordCount,
        ];
    }
}
