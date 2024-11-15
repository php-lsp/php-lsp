<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-15
 */
final class StaleRequestSupportOptions
{
    public function __construct(
        /**
         * The client will actively cancel the request.
         */
        public readonly bool $cancel,
        /**
         * The list of requests for which the client will retry the request if
         * it receives a response with error code `ContentModified`.
         *
         * @var list<string>
         */
        public readonly array $retryOnContentModified = [],
    ) {}
}
