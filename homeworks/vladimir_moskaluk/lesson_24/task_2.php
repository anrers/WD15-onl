<?php

// Интерфейс DocumentInterface
interface DocumentInterface
{
    public function process(): void;

    public function getInfo(): array;
}

// Класс TextDocument
readonly class TextDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private int    $wordCount
    ){
    }

    public function process(): void
    {
        echo "Обработка текстового документа: " . $this->title . "\n";
    }

    public function getInfo(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'wordCount' => $this->wordCount
        ];
    }

    // Дополнительные методы по заданию
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
        return $this->wordCount;
    }
}

// Класс ImageDocument
readonly class ImageDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private int    $width,
        private int    $height
    )
    {
    }

    public function process(): void
    {
        echo "Обработка графического документа: " . $this->title . "\n";
    }

    public function getInfo(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'width' => $this->width,
            'height' => $this->height
        ];
    }

    // Дополнительные методы по заданию
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
        return "$this->width x $this->height";
    }
}

// Класс VideoDocument
readonly class VideoDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private int    $duration
    ){
    }

    public function process(): void
    {
        echo "Обработка видеодокументов: " . $this->title . "\n";
    }

    public function getInfo(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration
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

    public function getDuration(): int
    {
        return $this->duration;
    }
}

// Создание объектов и вызов методов process(), getInfo() и специфичных методов
$textDoc = new TextDocument("Название документа 1", "Описание текстового документа", 1500);
$imageDoc = new ImageDocument("Название изображения", "Описание графического документа", 1920, 1080);
$videoDoc = new VideoDocument("Название видео", "Описание видеодокумента", 3600);

echo "Информация о текстовом документе: \n";
$textDoc->process();
print_r($textDoc->getInfo());
echo "Title: " . $textDoc->getTitle() . "\n";
echo "Description: " . $textDoc->getDescription() . "\n";
echo "Word Count: " . $textDoc->getWordCount() . "\n";

echo "\nИнформация об изображении документа:\n";
$imageDoc->process();
print_r($imageDoc->getInfo());
echo "Title: " . $imageDoc->getTitle() . "\n";
echo "Description: " . $imageDoc->getDescription() . "\n";
echo "Dimensions: " . $imageDoc->getDimensions() . "\n";

echo "\nИнформация о видеодокументах:\n";
$videoDoc->process();
print_r($videoDoc->getInfo());
echo "Title: " . $videoDoc->getTitle() . "\n";
echo "Description: " . $videoDoc->getDescription() . "\n";
echo "Duration: " . $videoDoc->getDuration() . " seconds\n";
