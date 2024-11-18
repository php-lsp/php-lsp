<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Result\Resolver;

use Lsp\Contracts\Hydrator\ExtractorInterface;

/**
 * @template-extends ResultResolver<object, mixed>
 */
final class ProtocolTypeResultResolver extends ResultResolver
{
    /**
     * @var non-empty-string
     */
    private const PROTOCOL_TYPE_NAMESPACE = 'Lsp\Protocol\Type\\';

    public function __construct(
        private readonly ExtractorInterface $extractor,
    ) {}

    public function supports(mixed $value): bool
    {
        return \is_object($value)
            && \str_starts_with($value::class, self::PROTOCOL_TYPE_NAMESPACE);
    }

    public function resolve(mixed $value): mixed
    {
        return $this->extractor->extract($value, $value::class);
    }
}
