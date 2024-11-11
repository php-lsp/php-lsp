#!/usr/bin/env php
<?php

use App\Application;
use Lsp\Kernel\Kernel;

if (in_array(PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) === false) {
    echo PHP_EOL . 'This app may only be invoked from a command line, got "' . PHP_SAPI . '"' . PHP_EOL;

    exit(1);
}

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

/** @var Application $app */
$app = new (Application::dotenv(__DIR__))(
    env: $_SERVER['APP_ENV'] ?? Kernel::DEFAULT_ENV,
    debug: (bool) ($_SERVER['APP_DEBUG'] ?? Kernel::DEFAULT_DEBUG),
);

$app->run(5007);

__halt_compiler();
