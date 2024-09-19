<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Router\Route\RouteInterface;
use Lsp\Router\RouterInterface;

/**
 * @template-extends \Traversable<array-key, RouteInterface>
 */
interface BuilderInterface extends \Traversable, \Countable
{
    public function build(): RouterInterface;

    /**
     * @return int<0, max>
     */
    public function count(): int;
}
