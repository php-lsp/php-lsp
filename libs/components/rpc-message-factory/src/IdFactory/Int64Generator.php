<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\IdFactory;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Rpc\Message\Factory\Exception\IdNotSupportedException;
use Lsp\Rpc\Message\Factory\IdFactory;
use Lsp\Rpc\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;

/**
 * @template-extends IntGenerator<int<0, 9223372036854775807>>
 */
final class Int64Generator extends IntGenerator
{
    /**
     * Maximal int64 value.
     *
     * @api
     */
    public const MAX_VALUE = 0x7FFF_FFFF_FFFF_FFFF;

    /**
     * Minimal int64 value.
     *
     * @api
     */
    public const MIN_VALUE = -0x7FFF_FFFF_FFFF_FFFF - 1;

    /**
     * @throws IdNotSupportedException if the current platform is not supported
     */
    public function __construct(
        IdFactoryInterface $ids = new IdFactory(),
        OverflowBehaviour $onOverflow = OverflowBehaviour::RESET,
    ) {
        if (\PHP_INT_SIZE !== 8) {
            throw IdNotSupportedException::fromInvalidPlatform('int64', 'int32');
        }

        parent::__construct($ids, $onOverflow);
    }

    public function getInitialValue(): int
    {
        return 0;
    }

    public function getMaximalValue(): int
    {
        return self::MAX_VALUE;
    }
}
