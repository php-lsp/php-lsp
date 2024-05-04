<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ShowMessageRequestParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<MessageActionItem> $actions
     */
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
        public readonly array $actions,
    ) {}
}
