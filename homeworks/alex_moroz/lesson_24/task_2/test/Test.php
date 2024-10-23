<?php

spl_autoload_register(function ($class_name) {
    require_once '../src/classes/' . $class_name . '.php';
});

use Documents\TextDocument;
use Documents\ImageDocument;
use Documents\VideoDocument;

$text = new TextDocument("Text Document", "Text Document description", __DIR__ . '/data/text.txt');

$image = new ImageDocument("Image", "Image description", __DIR__ . '/data/test_icon.png');

$video = new VideoDocument("Video", "Video description", '', 512);

$documents = [$text, $image, $video];

array_map(function ($document) {
    $document->process();
    $document->getInfo();
}, $documents);