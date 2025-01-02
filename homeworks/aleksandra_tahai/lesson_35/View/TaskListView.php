<?php

namespace View;

use Model\Models\TaskModel;

class TaskListView
{
    const TEMPLATE = 'list';

    public function render(array $tasks): string
    {
        $path = 'templates/' . self::TEMPLATE . '.template.php';

        ob_start();

        require_once $path;

        return ob_get_clean();

    }
}