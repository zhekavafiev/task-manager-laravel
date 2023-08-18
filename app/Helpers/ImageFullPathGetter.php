<?php

namespace App\Helpers;

final class ImageFullPathGetter
{
    public static function getFullPath($path): string
    {
        $path = trim($path, '/');
        $host = 'http://127.0.0.1:9001'; //TODO вынести в конфигурации
        $host = trim($host, '/');
        return $host . '/' . $path;
    }
}
