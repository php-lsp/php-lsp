<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Contracts\Router\RouteInterface;

/**
 * @template-extends \Traversable<array-key, RouteInterface>
 */
interface CollectorInterface extends \Traversable, \Countable
{
    /**
     * @return int<0, max>
     */
    public function count(): int;
}
