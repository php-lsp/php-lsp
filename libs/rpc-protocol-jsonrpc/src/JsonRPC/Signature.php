<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\JsonRPC;

enum Signature
{
    /**
     * Add and validate "jsonrpc" section.
     */
    case ALL;

    /**
     * Add "jsonrpc" section while encoding and do not
     * validate during decoding.
     */
    case NO_VALIDATE;

    /**
     * Validate "jsonrpc" section during decoding, but not add
     * it while encoding.
     */
    case NO_INSERT;

    /**
     * Do not add and validate "jsonrpc" section.
     */
    case NONE;

    public function shouldValidate(): bool
    {
        return $this === self::ALL || $this === self::NO_INSERT;
    }

    public function shouldInsert(): bool
    {
        return $this === self::ALL || $this === self::NO_VALIDATE;
    }
}
