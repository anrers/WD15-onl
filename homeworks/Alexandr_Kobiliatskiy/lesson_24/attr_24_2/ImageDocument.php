<?php
require_once 'C:\OSPanel\home\homework-24\attr_24_2\DocumentInterface.php';

class ImageDocument implements DocumentInterface
{
    public $file;
    public function __construct(
        public string $linc,
    ) {
        if (!pathinfo($this->linc, PATHINFO_EXTENSION) == 'jpg') {
            echo "Этот файл не изображение";
            die;
        }
    }

    public function getTitle(): string
    {
        return "Для работы с такими файлами нужна сторонняя библиотека";  
    }

    public function getDescription(): string
    {
        return "Этот файл - изображение";
    } 

    public function process(): string
    {
        if (pathinfo($this->linc, PATHINFO_EXTENSION) == 'jpg') {
            return "Этот файл может быть обработан этим классом";
        } else {
            return "Этот файл не может быть обработан этим классом";
        }
    }
 
    public function getInfo(): array
    {
        $this->file = fopen($this->linc, 'r');
        $info = [
            "Тип файла:" . pathinfo($this->linc, PATHINFO_EXTENSION),
            "Заголовок: У картинки не бывает заголовка",
            "Размер файла: " . filesize($this->linc) . " байт",
        ];
        fclose($this->file);
        return $info;
    }

    public function getDimensions(): string
    {
        return "Когда мы научимся работать с изображениями в PHP эта функция будет выводить размеры изображения";
    }
}

$imageObject = new ImageDocument('C:\OSPanel\home\homework-24\attr_24_2\image.jpg');

var_dump($imageObject->getTitle());
var_dump($imageObject->getDescription());
var_dump($imageObject->process());
var_dump($imageObject->getInfo());
var_dump($imageObject->getDimensions());