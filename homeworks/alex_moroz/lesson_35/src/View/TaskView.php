<?php

namespace Morozav\Lesson35\View;

class TaskView
{

    public function render(string $template, mixed $data): string
    {
        $path = 'templates/tasks/' . $template . '.template.php';

        ob_start();
        require_once $path;
        return ob_get_clean();
    }
}