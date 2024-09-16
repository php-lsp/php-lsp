<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Rpc\Codec\Exception\DecodingException;
use Lsp\Rpc\Codec\Exception\DependencyRequiredException;
use Lsp\Rpc\Codec\Exception\InvalidFieldTypeException;
use Lsp\Rpc\Codec\Exception\InvalidFieldValueException;
use Lsp\Rpc\Codec\Exception\RequiredFieldNotDefinedException;
use Lsp\Rpc\Codec\JsonRPC\Signature;
use Lsp\Rpc\Message\Factory\IdFactory;

/**
 * @template T of MessageInterface
 *
 * @template-implements DecoderInterface<T>
 */
abstract class Decoder extends Codec implements DecoderInterface
{
    /**
     * - JSON_BIGINT_AS_STRING: This flag adds support for converting large
     *   numbers to strings. Such problems can arise, for example, if the
     *   code runs on the x86 platform and receives an int64 message
     *   identifier.
     *
     * @var int<0, max>
     */
    public const DEFAULT_JSON_FLAGS_DECODE = \JSON_BIGINT_AS_STRING;

    /**
     * @var int<0, max>
     */
    private readonly int $jsonDecodingFlags;

    private readonly IdFactoryInterface $ids;

    /**
     * @param int<0, max> $jsonDecodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        ?IdFactoryInterface $ids = null,
        int $jsonDecodingFlags = self::DEFAULT_JSON_FLAGS_DECODE,
        int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        Signature $signature = Signature::ALL,
    ) {
        // @phpstan-ignore-next-line
        $this->jsonDecodingFlags = $jsonDecodingFlags | \JSON_THROW_ON_ERROR;
        $this->ids = $ids ?? $this->createIdFactory();

        parent::__construct($jsonMaxDepth, $signature);
    }

    private function createIdFactory(): IdFactoryInterface
    {
        if (\class_exists(IdFactory::class)) {
            return new IdFactory();
        }

        throw DependencyRequiredException::fromMissingIdFactoryImplementation();
    }

    /**
     * @template TArgId of mixed
     *
     * @param TArgId $id
     *
     * @return IdInterface<TArgId>
     * @throws DecodingException
     */
    protected function tryDecodeId(mixed $id): IdInterface
    {
        try {
            return $this->ids->create($id);
        } catch (\Throwable) {
            throw InvalidFieldTypeException::fromTypeOfField('id', 'int|string', $id);
        }
    }

    /**
     * @param array<array-key, mixed> $data
     * @return T
     * @throws DecodingException
     */
    abstract protected function toMessage(array $data): MessageInterface;

    public function decode(string $data): MessageInterface
    {
        $result = $this->fromJson($data);

        if ($this->signature->shouldValidate()) {
            if (!\array_key_exists('jsonrpc', $result)) {
                throw RequiredFieldNotDefinedException::fromField('jsonrpc');
            }

            if ($result['jsonrpc'] !== self::DEFAULT_VERSION_VALUE) {
                throw InvalidFieldValueException::fromValueOfField(
                    field: 'jsonrpc',
                    expected: \sprintf('"%s"', self::DEFAULT_VERSION_VALUE),
                    given: $result['jsonrpc'],
                );
            }
        }

        return $this->toMessage($result);
    }

    /**
     * @return array<array-key, mixed>
     */
    private function fromJson(string $json): array
    {
        try {
            return (array) \json_decode(
                json: $json,
                associative: true,
                depth: $this->jsonMaxDepth,
                flags: $this->jsonDecodingFlags,
            );
        } catch (\Throwable $e) {
            throw DecodingException::fromInternalDecodingError($e->getMessage(), (int) $e->getCode());
        }
    }
}
