<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\SerializationContext;
use Lsp\Contracts\Hydrator\ExtractorInterface;
use Lsp\Hydrator\JMS\Exception\MappingException;

final class Extractor implements ExtractorInterface
{
    public function __construct(
        private readonly ArrayTransformerInterface $transformer,
        private readonly SerializationContext $context = new SerializationContext(),
    ) {}

    public function extract(mixed $data, ?string $type = null): array
    {
        try {
            return $this->transformer->toArray((array)$data, $this->context, $type);
        } catch (\Throwable $e) {
            throw new MappingException($e->getMessage(), previous: $e);
        }
    }
}
