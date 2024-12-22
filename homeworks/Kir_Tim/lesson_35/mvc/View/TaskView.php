<?php


namespace View;
class TaskView
{

    public function render(string $template, mixed $tasks): string
    {
        $path = 'templates/' . $template . '.template.php';

        ob_start();
        require_once $path;
        return ob_get_clean();
    }
}