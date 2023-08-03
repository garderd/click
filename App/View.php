<?php
namespace App;

class View{
    public static function render($path, $data = [])
    {
        $fullPath = __DIR__ . '/../Views/' . $path . '.php';
        if(!file_exists($fullPath)){
            throw new \ErrorException("View cannot be found");
        }

        include($fullPath);
    }
}