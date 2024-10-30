<?php
require_once 'DocumentInterface.php';

class ImageDocument implements DocumentInterface
{
    private string $title;
    private string $description;
    private int $width;
    private int $height;

    public function __construct($title, $description, $width, $height)
    {
        $this->title = $title;
        $this->description = $description;
        $this->width = $width;
        $this->height = $height;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDimensions()
    {
        return [
            $this->width,
            $this->height,
        ];
    }

    public function process()
    {
        echo "Processing Image Document...\n";
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}
