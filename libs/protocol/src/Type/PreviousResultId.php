<?php

namespace Lsp\Protocol\Type;

/**
 * A previous result id in a workspace pull request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class PreviousResultId
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly string $value,
    ) {}
}
