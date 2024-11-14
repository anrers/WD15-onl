<?php
require_once "../lesson_24/second_task/ImageDocument.php";
require_once "../lesson_24/second_task/TextDocument.php";
require_once "../lesson_24/second_task/VideoDocument.php";

$text = new TextDocument('bookish', 'mix', "hehehehehehehe");
$text->open();
$textTitle = $text->getTitle();

$image = new ImageDocument("cats", "picture of cats.png");
$image->open();
$imageInf = $image->getDescription();

var_dump($imageInf);

$video = new VideoDocument("cats", "video.mp4", '400987');
$video->open();
$videoDuraction = $video->getDuration();
