<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Result\Resolver;

use Lsp\Contracts\Hydrator\ExtractorInterface;

/**
 * @template-extends ResultResolver<mixed, mixed>
 */
final class GenericResultResolver extends ResultResolver
{
    public function __construct(
        private readonly ExtractorInterface $extractor,
    ) {}

    /**
     * @phpstan-ignore-next-line
     */
    public function supports(mixed $value): bool
    {
        return true;
    }

    public function resolve(mixed $value): mixed
    {
        return $this->extractor->extract($value);
    }
}
