<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\ArgumentResolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Dispatcher\Argument\Resolver\ArgumentResolver;
use Lsp\Extension\DocumentManager\Editor\EditorInterface;
use Lsp\Extension\DocumentManager\Editor\EditorProviderInterface;
use Lsp\Extension\DocumentManager\Editor\MutableEditorInterface;

final class EditorArgumentResolver extends ArgumentResolver
{
    public function __construct(
        private readonly EditorProviderInterface $provider,
    ) {}

    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        $then = fn(): iterable => yield $this->provider->getEditor(
            message: $route->getRequest(),
        );

        yield from $this->whenType($parameter, MutableEditorInterface::class, $then);
    }
}
