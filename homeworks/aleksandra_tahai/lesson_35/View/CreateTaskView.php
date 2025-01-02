<?php
namespace View;

class CreateTaskView{
    const TEMPLATE = 'create';

    public function render(): string
    {
        $path = 'templates/' . self::TEMPLATE . '.template.php';

        ob_start();

        require_once $path;

        return ob_get_clean();

    }
}