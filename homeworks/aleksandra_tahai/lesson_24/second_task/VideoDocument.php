<?php
require_once 'DocumentInterface.php';

class VideoDocument implements DocumentInterface
{
    public function __construct(
        protected string $title,
        protected string $description,
        protected string $duration,
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

    public function getDuration()
    {
        return $this->duration;
    }

    public function open()
    {
        echo "Opening document\n";
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            "duration" => $this->getDuration(),
        ];
    }

}
