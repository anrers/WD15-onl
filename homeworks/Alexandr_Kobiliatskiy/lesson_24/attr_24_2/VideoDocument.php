<?php
require_once 'C:\OSPanel\home\homework-24\attr_24_2\DocumentInterface.php';

class VideoDocument implements DocumentInterface
{
    public $file;
    public function __construct(
        public string $linc,
    ) {
        if (!pathinfo($this->linc, PATHINFO_EXTENSION) == 'mp4') {
            echo "Этот файл не изображение";
            die;
        }   
    }

    public function getTitle() {
        return "Для работы с такими файлами нужна сторонняя библиотека";  
    } 
    public function getDescription() {
        return "Это видеофайл";
    } 

    public function process() {
        if (pathinfo($this->linc, PATHINFO_EXTENSION) == 'mp4') {
            return "Этот файл может быть обработан этим классом";
        } else {
            echo "Этот файл не может быть обработан этим классом";
        }   
        
    } 
 
    public function getInfo() {
        $this->file = fopen($this->linc, 'r');
        $info = [
            "Тип файла:" . pathinfo($this->linc, PATHINFO_EXTENSION),
            "Заголовок: У видео не бывает заголовка",
            "Размер файла: " . filesize($this->linc) . " байт",
        ];
        fclose($this->file);
        return $info;
    }

    public function getDuration() {
        return "Когда мы научимся работать с видеофайлами в PHP эта функция будет выводить длительность";
    }
}

$videoObject = new VideoDocument('C:\OSPanel\home\homework-24\attr_24_2\video.mp4');

var_dump($videoObject->getTitle());
var_dump($videoObject->getDescription());
var_dump($videoObject->process());
var_dump($videoObject->getInfo());
var_dump($videoObject->getDuration());