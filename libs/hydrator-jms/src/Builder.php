<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\SerializerBuilder;
use Lsp\Contracts\Hydrator\ExtractorInterface;
use Lsp\Contracts\Hydrator\HydratorInterface;

final class Builder
{
    private readonly ArrayTransformerInterface $transformer;

    public function __construct(
        private readonly bool $debug = false,
    ) {
        $this->transformer = $this->build(SerializerBuilder::create())
            ->build();
    }

    private function build(SerializerBuilder $builder): SerializerBuilder
    {
        return $builder->setDebug($this->debug)
            ->enableEnumSupport()
            // ->setMetadataDirs([__DIR__ . '/../resources'])
        ;
    }

    /**
     * @api
     */
    public function getHydrator(): HydratorInterface
    {
        return new Hydrator($this->transformer);
    }

    /**
     * @api
     */
    public function getExtractor(): ExtractorInterface
    {
        return new Extractor($this->transformer);
    }
}
