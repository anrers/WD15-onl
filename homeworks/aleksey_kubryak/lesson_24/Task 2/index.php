<?php

require_once 'TextDocument.php';
require_once 'ImageDocument.php';
require_once 'VideoDocument.php';

$textDoc = new TextDocument('Text', 'Text document description', 'Lorem ipsum dolor sit amet');
$textDoc->process();
print_r($textDoc->getInfo());

$imgDoc = new ImageDocument('Image', 'Image description', 1920, 1080);
$imgDoc->process();
print_r($imgDoc->getInfo());

$videoDoc = new VideoDocument('Video', 'Video description', '2 hours 30 minutes');
$videoDoc->process();
print_r($videoDoc->getInfo());