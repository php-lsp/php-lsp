<?php

namespace Lsp\Protocol\Type;

/**
 * A previous result id in a workspace pull request.
 *
 * @generated
 * @since 3.17.0
 */
final class PreviousResultId
{
    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly string $value,
    ) {}
}
