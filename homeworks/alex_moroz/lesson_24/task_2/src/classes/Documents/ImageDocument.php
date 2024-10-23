<?php

namespace Documents;

class ImageDocument extends AbstractDocument
{
    public function getDimensions()
    {
        //Индексы 0 и 1 содержат ширину и высоту изображения.
        $imageData = getimagesize($this->getPath());
        if ($imageData) {
            return "Width: " . $imageData[0] . ", Height: " . $imageData[1];
        }
        return 'Cant resolve';
    }

    public function getInfo()
    {
        print_r([
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'dimensions' => $this->getDimensions(),
        ]);
    }
}