<?php

declare(strict_types=1);

namespace Lsp\Kernel\Container;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class Builder
{
    /**
     * @param callable(ContainerBuilder):void $then
     */
    abstract public function build(callable $then): Container;
}
