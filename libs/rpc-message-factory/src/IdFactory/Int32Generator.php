<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\IdFactory;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Rpc\Message\Factory\IdFactory;
use Lsp\Rpc\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;

/**
 * The most compatible generator with all subsystems and platforms.
 *
 * @template-extends IntGenerator<int<0, 2147483647>>
 */
final class Int32Generator extends IntGenerator
{
    /**
     * Maximal int32 value.
     *
     * @api
     */
    public const MAX_VALUE = 0x7FFF_FFFF;

    /**
     * Minimal int32 value.
     *
     * @api
     */
    public const MIN_VALUE = -0x7FFF_FFFF - 1;

    /**
     * @param (OverflowBehaviour::*) $onOverflow
     */
    public function __construct(
        IdFactoryInterface $ids = new IdFactory(),
        OverflowBehaviour $onOverflow = OverflowBehaviour::RESET,
    ) {
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
