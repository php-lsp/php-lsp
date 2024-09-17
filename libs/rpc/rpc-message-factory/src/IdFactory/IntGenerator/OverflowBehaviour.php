<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\IdFactory\IntGenerator;

enum OverflowBehaviour
{
    /**
     * In case of overflow of identifiers, reset the value to zero.
     */
    case RESET;

    /**
     * In case of overflow of a valid set of identifiers, throw an exception.
     */
    case EXCEPTION;
}
