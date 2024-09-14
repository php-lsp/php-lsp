<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\SerializationContext;
use Lsp\Contracts\Hydrator\ExtractorInterface;

final class Extractor implements ExtractorInterface
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

    public function extract(mixed $data): mixed
    {
        $context = SerializationContext::create()
            ->setSerializeNull(true);

        if (\is_scalar($data) || $data === null) {
            return $data;
        }

        return $this->transformer->toArray($data, $context);
    }
}
