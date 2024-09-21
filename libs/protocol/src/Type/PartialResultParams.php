<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class PartialResultParams
{
    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken An
     *        optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(int|string|null $partialResultToken = null)
    {
        $this->partialResultToken = $partialResultToken;
    }
}
