<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Additional information that describes document changes.
 *
 * @since 3.16.0
 */
final class ChangeAnnotation
{
    public function __construct(
        /**
         * A human-readable string describing the actual change. The string is
         * rendered prominent in the user interface.
         */
        public readonly string $label,
        /**
         * A flag which indicates that user confirmation is needed before
         * applying the change.
         */
        public readonly ?bool $needsConfirmation = null,
        /**
         * A human-readable string which is rendered less prominent in the user
         * interface.
         */
        public readonly ?string $description = null,
    ) {}
}
