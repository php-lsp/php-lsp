<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The result of a showDocument request.
 *
 * @since 3.16.0
 */
final class ShowDocumentResult
{
    public function __construct(
        /**
         * A boolean indicating if the show was successful.
         */
        public readonly bool $success,
    ) {}
}
