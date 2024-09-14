<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel;

use Lsp\Protocol\Generator\MetaModel\Exception\MetaModelInvalidSpecificationException;
use Lsp\Protocol\Generator\MetaModel\Exception\MetaModelNonDecodableException;
use Lsp\Protocol\Generator\MetaModel\Exception\MetaModelNotReadableException;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\Version;
use Lsp\Protocol\Generator\VersionInterface;

final class Factory
{
    /**
     * @var non-empty-string
     */
    public const DEFAULT_SPEC_DIRECTORY = __DIR__ . '/../../resources/lsp';

    /**
     * @param non-empty-string $directory
     */
    public function __construct(
        private readonly string $directory = self::DEFAULT_SPEC_DIRECTORY,
    ) {}

    /**
     * @throws MetaModelInvalidSpecificationException
     */
    public function createFromVersion(VersionInterface $version = Version::LATEST): MetaModel
    {
        $pathname = \vsprintf('%s/%s/metaModel.json', [
            $this->directory,
            $version->getVersion(),
        ]);

        if (!\is_readable($pathname)) {
            throw MetaModelInvalidSpecificationException::fromInvalidSpecification($version->getVersion());
        }

        return $this->createFromJsonFile($pathname);
    }

    /**
     * @param non-empty-string $pathname
     *
     * @throws MetaModelNotReadableException
     */
    public function createFromJsonFile(string $pathname): MetaModel
    {
        $json = @\file_get_contents($pathname);

        if ($json === false || $json === '') {
            throw MetaModelNotReadableException::fromNotReadableFile($pathname);
        }

        return $this->createFromJsonString($json);
    }

    /**
     * @param non-empty-string $json
     *
     * @throws MetaModelNonDecodableException
     */
    public function createFromJsonString(string $json): MetaModel
    {
        try {
            $data = (array) \json_decode($json, true, 64, \JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw MetaModelNonDecodableException::fromDecodingException(
                message: $e->getMessage(),
                previous: $e,
            );
        }

        return $this->createFromArray($data);
    }

    /**
     * @param array<array-key, mixed> $data
     */
    public function createFromArray(array $data): MetaModel
    {
        // @phpstan-ignore-next-line
        return MetaModel::fromArray($data);
    }
}
