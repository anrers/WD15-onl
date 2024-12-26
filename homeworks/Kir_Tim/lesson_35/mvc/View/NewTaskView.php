<?php

namespace View;

class NewTaskView
{
    public function render(string $template): string
    {
        $path = 'templates/' . $template . '.template.php';

        ob_start();
        require_once $path;
        return ob_get_clean();
    }
}