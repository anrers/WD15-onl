<?php

require_once "ImageDocument.php";
require_once "TextDocument.php";
require_once "VideoDocument.php";
require_once 'DocumentInterface.php';

$textDocument = new TextDocument('Текстовый документ', 'Текст', 'Буквы');
$imageDocument = new ImageDocument("Изображение", 'Картинка', 600, 500);
$videoDocument = new VideoDocument('Видео', 'Видос', 3600);

print_r($textDocument->getInfo());
$textDocument->process();

print_r($imageDocument->getInfo());
$imageDocument->process();

print_r($videoDocument->getInfo());
$videoDocument->process();