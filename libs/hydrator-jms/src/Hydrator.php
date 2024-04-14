<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\DeserializationContext;
use Lsp\Contracts\Hydrator\HydratorInterface;
use Lsp\Hydrator\JMS\Exception\Context;
use Lsp\Hydrator\JMS\Exception\MappingException;

final class Hydrator implements HydratorInterface
{
    public function __construct(
        private readonly ArrayTransformerInterface $transformer,
    ) {}

    /**
     * @api
     */
    public function getArrayTransformer(): ArrayTransformerInterface
    {
        return $this->transformer;
    }

    /**
     * @psalm-suppress MixedReturnStatement : Hydrator may return any value
     */
    public function hydrate(string $type, mixed $data): mixed
    {
        $context = DeserializationContext::create();

        if (\is_array($data) || \is_object($data)) {
            return $this->transformer->fromArray((array) $data, $type, $context);
        }

        $context = new Context('object', Context::getPublicTypeName($data));

        throw MappingException::fromContext($context);
    }
}
