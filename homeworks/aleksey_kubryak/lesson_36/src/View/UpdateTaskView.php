<?php

namespace View;

class UpdateTaskView
{
    const string TEMPLATE = 'update';

    public function render(array $data): string
    {
        $path = 'templates/' . self::TEMPLATE . '.template.php';

        extract($data);
        
        ob_start();
        require_once $path;
        return ob_get_clean();
    }
}