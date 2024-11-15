<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Additional information about the context in which a signature help request
 * was triggered.
 *
 * @since 3.15.0
 *
 * @generated 2024-11-15
 */
final class SignatureHelpContext
{
    public function __construct(
        /**
         * Action that caused signature help to be triggered.
         */
        public readonly SignatureHelpTriggerKind $triggerKind,
        /**
         * `true` if signature help was already showing when it was triggered.
         *
         * Retriggers occurs when the signature help is already active and can
         * be caused by actions such as typing a trigger character, a cursor
         * move, or document content changes.
         */
        public readonly bool $isRetrigger,
        /**
         * Character that caused signature help to be triggered.
         *
         * This is undefined when `triggerKind !==
         * SignatureHelpTriggerKind.TriggerCharacter`.
         */
        public readonly ?string $triggerCharacter = null,
        /**
         * The currently active `SignatureHelp`.
         *
         * The `activeSignatureHelp` has its `SignatureHelp.activeSignature`
         * field updated based on the user navigating through available
         * signatures.
         */
        public readonly ?SignatureHelp $activeSignatureHelp = null,
    ) {}
}
