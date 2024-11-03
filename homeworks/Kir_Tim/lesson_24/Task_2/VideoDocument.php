<?php

require_once 'DocumentInterface.php';

class VideoDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private int    $duration
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

    public function getDuration()
    {
        return $this->duration;
    }

    public function process()
    {
        echo "Обработка видео";
    }

    public function getInfo()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration,
        ];
    }
}