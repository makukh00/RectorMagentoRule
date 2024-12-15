<?php

use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(CompleteDynamicPropertiesRector::class);
    // PHP 8.2 upgrade
    $rectorConfig->sets([Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_82]);

    // Define directories to check
    $directories = [
        __DIR__ . '/app/code',
        __DIR__ . '/app/design',
    ];
    // Add phtml
    $rectorConfig->fileExtensions(['php', 'phtml']);

    // Filter out directories that do not exist
    $existingDirectories = array_filter($directories, function ($dir) {
        return is_dir($dir);
    });

    // Add existing directories to the configuration
    $rectorConfig->paths($existingDirectories);
}; 
