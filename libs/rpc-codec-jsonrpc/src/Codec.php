<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Rpc\Codec\JsonRPC\Signature;

abstract class Codec
{
    /**
     * @var int<1, 2147483647>
     */
    public const DEFAULT_JSON_DEPTH = 64;

    /**
     * @var non-empty-string
     */
    protected const DEFAULT_VERSION_VALUE = '2.0';

    public function __construct(
        /**
         * Maximum nesting depth of the structure being decoded or decoded.
         *
         * The value must be greater than 0, and less than or equal
         * to 2147483647.
         *
         * @var int<1, 2147483647>
         */
        protected readonly int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        /**
         * The "jsonrpc" signature settings.
         */
        protected readonly Signature $signature = Signature::ALL,
    ) {}
}
