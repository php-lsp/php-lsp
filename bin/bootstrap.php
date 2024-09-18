#!/usr/bin/env php
<?php

if (in_array(PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) === false) {
    echo PHP_EOL . 'This app may only be invoked from a command line, got "' . PHP_SAPI . '"' . PHP_EOL;

    exit(1);
}

if ('' !== Phar::running(false)) {
    echo PHP_EOL . 'This app may only be invoked via phar binary' . PHP_EOL;

    exit(1);
}

//Phar::mapPhar('lsp.phar');

//require 'phar://lsp.phar/.box/check_requirements.php';

(static function (): void {
    if (file_exists($autoload = __DIR__ . '/../../../autoload.php')) {
        // Is installed via Composer
        include_once $autoload;

        return;
    }

    if (file_exists($autoload = __DIR__ . '/../vendor/autoload.php')) {
        // Is installed locally
        include_once $autoload;

        return;
    }

    throw new RuntimeException('Unable to find the Composer autoloader.');
})();

echo 'Hello World';

__halt_compiler();
