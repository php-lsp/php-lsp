<?php

namespace Lsp\Protocol\Type;

/**
 * Additional information about the context in which a signature help request was triggered.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.15.0
 */
final class SignatureHelpContext
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.15.0
     */
    final public function __construct(
        public readonly SignatureHelpTriggerKind $triggerKind,
        public readonly string $triggerCharacter,
        public readonly bool $isRetrigger,
        public readonly SignatureHelp $activeSignatureHelp,
    ) {}
}
