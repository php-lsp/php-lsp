<?php

namespace Lsp\Protocol\Type;

/**
 * Additional information about the context in which a signature help request was triggered.
 *
 * @generated
 * @since 3.15.0
 */
final class SignatureHelpContext
{
    final public function __construct(
        public readonly SignatureHelpTriggerKind $triggerKind,
        public readonly string $triggerCharacter,
        public readonly bool $isRetrigger,
        public readonly SignatureHelp $activeSignatureHelp,
    ) {}
}
