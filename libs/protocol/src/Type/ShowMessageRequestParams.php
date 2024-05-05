<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ShowMessageRequestParams
{
    /**
     * @param list<MessageActionItem> $actions
     */
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
        public readonly array $actions,
    ) {}
}
