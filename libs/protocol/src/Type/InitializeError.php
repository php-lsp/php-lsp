<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The data type of the ResponseError if the initialize request fails.
 *
 * @generated 2024-11-15
 */
final class InitializeError
{
    public function __construct(
        /**
         * Indicates whether the client execute the following retry logic:
         * (1) show the message provided by the ResponseError to the user
         * (2) user selects retry or cancel
         * (3) if user selected retry the initialize method is sent again.
         */
        public readonly bool $retry,
    ) {}
}
