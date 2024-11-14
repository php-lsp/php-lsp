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
        $this->transformer = SerializerBuilder::create()
            // ->setMetadataDirs([
            //    'Lsp\\Protocol\\Type\\' => __DIR__ . '/../resources'
            // ])
            ->addDefaultListeners()
            ->addDefaultHandlers()
            ->enableEnumSupport()
            ->setDebug($this->debug)
            ->build();
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
