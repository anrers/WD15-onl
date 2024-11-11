<?php

namespace Documents;

class VideoDocument extends AbstractDocument
{
    public function __construct(
        string $title,
        string $description,
        string $path,
        private string $duration,
    ) {
        parent::__construct($title, $description, $path);
    }

    public function getInfo()
    {
        print_r([
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            '$duration' => $this->getDuration() . " seconds",
        ]);
    }

    public function getDuration()
    {
        return $this->duration;
    }
}