<?php

interface DocumentInterface {
    public function getTitle();
    public function getDescription();
    public function process();
    public function getInfo();
}

class TextDocument implements DocumentInterface {
    private $title;
    private $description;
    private $content;

    public function __construct($title, $description, $content) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function process() {
        echo "Processing Text Document...\n";
    }

    public function getInfo() {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'word_count' => $this->getWordCount()
        ];
    }

    public function getWordCount() {
        return str_word_count($this->content);
    }
}

class ImageDocument implements DocumentInterface {
    private $title;
    private $description;
    private $width;
    private $height;

    public function __construct($title, $description, $width, $height) {
        $this->title = $title;
        $this->description = $description;
        $this->width = $width;
        $this->height = $height;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function process() {
        echo "Processing Image Document...\n";
    }

    public function getInfo() {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'dimensions' => $this->getDimensions()
        ];
    }

    public function getDimensions() {
        return "{$this->width}x{$this->height}";
    }
}

class VideoDocument implements DocumentInterface {
    private $title;
    private $description;
    private $duration;

    public function __construct($title, $description, $duration) {
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function process() {
        echo "Processing Video Document...\n";
    }

    public function getInfo() {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->getDuration()
        ];
    }

    public function getDuration() {
        return $this->duration;
    }
}

$textDoc = new TextDocument("Just doc", "A sample text document", "This is the content of the text document.");
$imageDoc = new ImageDocument("Image", "A sample image", 1920, 1080);
$videoDoc = new VideoDocument("Video", "A sample video", "2:30:00");

$textDoc->process();
$imageDoc->process();
$videoDoc->process();

echo "Text Document Info: ";
print_r($textDoc->getInfo());

echo "Image Document Info: ";
print_r($imageDoc->getInfo());

echo "Video Document Info: ";
print_r($videoDoc->getInfo());
?>