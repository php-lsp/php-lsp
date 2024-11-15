<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An inlay hint label part allows for interactive and composite labels of inlay
 * hints.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class InlayHintLabelPart
{
    public function __construct(
        /**
         * The value of this label part.
         */
        public readonly string $value,
        /**
         * The tooltip text when you hover over this label part. Depending on
         * the client capability `inlayHint.resolveSupport` clients might
         * resolve this property late using the resolve request.
         */
        public readonly string|MarkupContent|null $tooltip = null,
        /**
         * An optional source code location that represents this label part.
         *
         * The editor will use this location for the hover and for code
         * navigation features: This part will become a clickable link that
         * resolves to the definition of the symbol at the given location (not
         * necessarily the location itself), it shows the hover that shows at
         * the given location,
         * and it shows a context menu with further code navigation commands.
         *
         * Depending on the client capability `inlayHint.resolveSupport` clients
         * might resolve this property late using the resolve request.
         */
        public readonly ?Location $location = null,
        /**
         * An optional command for this label part.
         *
         * Depending on the client capability `inlayHint.resolveSupport` clients
         * might resolve this property late using the resolve request.
         */
        public readonly ?Command $command = null,
    ) {}
}
