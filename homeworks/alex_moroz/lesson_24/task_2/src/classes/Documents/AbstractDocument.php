<?php

namespace Documents;

use Interfaces\Documents\DocumentInterface;

abstract class AbstractDocument implements DocumentInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private string $path,
    ) {
    }

    public function open()
    {
        return file_get_contents($this->path);
    }

    public function save($data, $update = true)
    {
        if ($update) {
            file_put_contents($this->path, $data, FILE_APPEND);
        } else {
            file_put_contents($this->path, $data);
        }
    }

    public function process()
    {
        $className = str_replace('Documents\\', '',  get_class($this));
        echo "Processing " . $className . " {" . $this->getTitle() . "}...\n";
    }

    abstract public function getInfo();

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}