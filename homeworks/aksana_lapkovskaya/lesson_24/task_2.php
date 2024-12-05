<?php

interface DocumentInterface {
    public function getTitle(): string;
    public function getDescription(): string;
    public function process(): void;
    public function getInfo(): array;
}

class TextDocument implements DocumentInterface {
    private string $title;
    private string $description;
    private string $content;

    public function __construct(string $title, string $description, string $content) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function process(): void {
        echo "Processing Text Document...\n";
    }

    public function getInfo(): array {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'word_count' => $this->getWordCount()
        ];
    }

    public function getWordCount(): int {
        return str_word_count($this->content);
    }
}

class ImageDocument implements DocumentInterface {
    private string $title;
    private string $description;
    private int $width;
    private int $height;

    public function __construct(string $title, string $description, int $width, int $height) {
        $this->title = $title;
        $this->description = $description;
        $this->width = $width;
        $this->height = $height;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function process(): void {
        echo "Processing Image Document...\n";
    }

    public function getInfo(): array {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'dimensions' => $this->getDimensions()
        ];
    }

    public function getDimensions(): string {
        return "{$this->width}x{$this->height}";
    }
}

class VideoDocument implements DocumentInterface {
    private string $title;
    private string $description;
    private string $duration;

    public function __construct(string $title, string $description, string $duration) {
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function process(): void {
        echo "Processing Video Document...\n";
    }

    public function getInfo(): array {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->getDuration()
        ];
    }

    public function getDuration(): string {
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