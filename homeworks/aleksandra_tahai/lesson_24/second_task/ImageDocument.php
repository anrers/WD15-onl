<?php
require_once 'DocumentInterface.php';

class ImageDocument implements DocumentInterface
{
    public function __construct(
        protected string $title,
        protected string $description,
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

    public function open(): void
    {
        echo "this type in process! ";
    }

    public function getDimensions()
    {
        $size = getimagesize($this->title);
        return $size;
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            "width" => $this->getDimensions()[0],
            "height" => $this->getDimensions()[1],

        ];
    }
}
