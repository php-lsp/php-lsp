<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\DeserializationContext;
use Lsp\Contracts\Hydrator\HydratorInterface;
use Lsp\Hydrator\JMS\Exception\MappingException;

final class Hydrator implements HydratorInterface
{
    public function __construct(
        private readonly ArrayTransformerInterface $transformer,
        private readonly DeserializationContext $context = new DeserializationContext(),
    ) {}

    public function hydrate(string $type, mixed $data): mixed
    {
        try {
            return $this->transformer->fromArray((array)$data, $type, $this->context);
        } catch (\Throwable $e) {
            throw new MappingException($e->getMessage(), previous: $e);
        }
    }
}
