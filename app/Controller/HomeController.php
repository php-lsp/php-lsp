<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Router\Attribute\Route;

#[AsController, Route('test')]
final class HomeController
{
    public function __invoke()
    {
    }
}
