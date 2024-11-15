<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class InlayHintOptions
{
    public function __construct(
        /**
         * The server provides support to resolve additional information for an
         * inlay hint item.
         */
        public readonly ?bool $resolveProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
