<?php
declare(strict_types=1);

namespace Helpers;

class Configuration{
    public static function getFileContent(string $filename) : array{
        $fileContent = [];
        $path = realpath(sprintf(__DIR__ . '/../configuration/%s.php', $filename));

        if(file_exists($path)){
            $fileContent = require $path;
        }

        return $fileContent;
    }
}