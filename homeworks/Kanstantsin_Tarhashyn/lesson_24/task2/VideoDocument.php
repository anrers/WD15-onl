<?php
require_once 'DocumentInterface.php';


class VideoDocument implements DocumentInterface
{
    private string $title;
    private string $description;
    private int $duration;

    public function __construct(string $title, string $description, int $duration)
    {
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
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
        echo "Processing Video Document...\n";
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