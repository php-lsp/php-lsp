<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class HoverClientCapabilities
{
    public function __construct(
        /**
         * Whether hover supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Client supports the following content formats for the content
         * property. The order describes the preferred format of the client.
         *
         * @var list<MarkupKind>|null
         */
        public readonly ?array $contentFormat = null,
    ) {}
}
