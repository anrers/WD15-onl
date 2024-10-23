<?php

namespace Documents;

class TextDocument extends AbstractDocument
{
    public function getWordCount()
    {
        $data = $this->open();
        return str_word_count($data);
    }

    public function getInfo()
    {
        print_r([
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'total_words' => $this->getWordCount(),
        ]);
    }
}