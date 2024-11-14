<?php
require_once 'DocumentInterface.php';
require_once 'TextDocument.php';
require_once 'ImageDocument.php';
require_once 'VideoDocument.php';

$textDocument = new TextDocument("Text Document", "This is a text document", 2000);
$imageDocument = new ImageDocument("Image Document", "This is an image document", 1920, 1080);
$videoDocument = new VideoDocument("Video Document", "This is a video document", 3600);

$textDocument->process();
$imageDocument->process();
$videoDocument->process();

echo "Text Document info: ";
print_r($textDocument->getInfo());

echo "Image Document info: ";
print_r($imageDocument->getInfo());

echo "Video Document info: ";
print_r($videoDocument->getInfo());
