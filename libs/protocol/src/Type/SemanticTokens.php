<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class SemanticTokens
{
    public function __construct(
        /**
         * An optional result id. If provided and clients support delta updating
         * the client will include the result id in the next semantic token
         * request.
         * A server can then instead of computing all semantic tokens again
         * simply send a delta.
         */
        public readonly ?string $resultId = null,
        /**
         * The actual tokens.
         *
         * @var list<int<0, 2147483647>>
         */
        public readonly array $data = [],
    ) {}
}
