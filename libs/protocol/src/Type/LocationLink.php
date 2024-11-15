<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents the connection of two locations. Provides additional metadata over
 * normal {@link Location locations},
 * including an origin range.
 *
 * @generated 2024-11-15
 */
final class LocationLink
{
    public function __construct(
        /**
         * The target resource identifier of this link.
         *
         * @var non-empty-string
         */
        public readonly string $targetUri,
        /**
         * The full target range of this link. If the target for example is a
         * symbol then target range is the range enclosing this symbol not
         * including leading/trailing whitespace but everything else like
         * comments. This information is typically used to highlight the range
         * in the editor.
         */
        public readonly Range $targetRange,
        /**
         * The range that should be selected and revealed when this link is
         * being followed, e.g the name of a function.
         * Must be contained by the `targetRange`. See also
         * `DocumentSymbol#range`.
         */
        public readonly Range $targetSelectionRange,
        /**
         * Span of the origin of this link.
         *
         * Used as the underlined span for mouse interaction. Defaults to the
         * word range at the definition position.
         */
        public readonly ?Range $originSelectionRange = null,
    ) {}
}
