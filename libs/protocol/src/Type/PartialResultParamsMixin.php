<?php

namespace Lsp\Protocol\Type;

trait PartialResultParamsMixin
{
    /**
     * An optional token that a server can use to report partial results (e.g. streaming) to
     * the client.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @var int<-2147483648, 2147483647>|string
     */
    public readonly int|string $partialResultToken;
}
