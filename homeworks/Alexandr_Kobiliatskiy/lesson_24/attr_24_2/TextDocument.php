<?php
require_once 'C:\OSPanel\home\homework-24\attr_24_2\DocumentInterface.php';

class TextDocument implements DocumentInterface
{
    public $file;
    public function __construct(
        public string $linc,
    ) {
        if (!pathinfo($this->linc, PATHINFO_EXTENSION) == 'txt') {
            echo "Это не текстовый файл";
            die;
        }   
    }

    public function getTitle() {
        $this->file = fopen($this->linc, 'r');
        $title = fgets($this->file);
        fclose($this->file);
        return $title;  
    } 
    public function getDescription() {
        return "Это текстовый файл";
    } 
    public function process() {
        if (pathinfo($this->linc, PATHINFO_EXTENSION) == 'txt') {
            return "Этот файл может быть обработан этим классом";
        } else {
            echo "Этот файл не может быть обработан этим классом";
        }   
        
    } 
    public function getInfo() {
        $this->file = fopen($this->linc, 'r');
        $title = fgets($this->file);
        $info = [
            "Тип файла:" . pathinfo($this->linc, PATHINFO_EXTENSION),
            "Заголовок: " . $title,
            "Размер файла:" . filesize($this->linc) . " байт",
        ];
        fclose($this->file);
        return $info;
    }

    public function getWordCount() {
        $text = file_get_contents($this->linc);
        $text = str_replace(array("\r", "\n"), ' ', $text);
        $array = explode(" ", $text);

        $new_array = array_filter($array, function($element) {
            return $element !== "";
        });
        return count($new_array);
    }
}

$tD = new TextDocument('C:\OSPanel\home\homework-24\attr_24_2\index.txt');

echo $tD->getTitle();// Работает

echo ($tD->getWordCount());