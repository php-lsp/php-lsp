<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A previous result id in a workspace pull request.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class PreviousResultId
{
    public function __construct(
        /**
         * The URI for which the client knowns a result id.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * The value of the previous result id.
         */
        public readonly string $value,
    ) {}
}
