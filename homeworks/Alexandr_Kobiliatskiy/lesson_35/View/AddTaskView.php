<?php

namespace View;

class AddTaskView
{
    const string TEMPLATE = 'list';

    public function render(): string
    {
        $path = 'templates/' . self::TEMPLATE . '.templateAddTask.php';

        ob_start();
        require_once $path;
        return ob_get_clean();
    }
}
