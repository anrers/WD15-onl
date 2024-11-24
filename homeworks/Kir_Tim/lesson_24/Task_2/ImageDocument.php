<?php

require_once 'DocumentInterface.php';

class ImageDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private int    $width,
        private int    $height
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

    public function getDimensions(): array
    {
        return [
            $this->width,
            $this->height,
        ];
    }

    public function process(): void
    {
        echo "Обработка изображения";
    }

    public function getInfo(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}