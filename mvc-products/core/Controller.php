<?php

class Controller
{
    public function view($path, $data = [])
    {
        extract($data);

        $file = dirname(__DIR__) . '/app/views/' . $path . '.php';

        if (!file_exists($file)) {
            die('View not found: ' . $file);
        }

        require $file;
    }
}