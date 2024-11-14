<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The Client Capabilities of a {@link CodeActionRequest}.
 *
 * @generated 2024-11-14
 */
final class CodeActionClientCapabilities
{
    public function __construct(
        /**
         * Whether code action supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client support code action literals of type `CodeAction` as a
         * valid response of the `textDocument/codeAction` request. If the
         * property is not set the request can only return `Command` literals.
         *
         * @since 3.8.0
         */
        public readonly ?ClientCodeActionLiteralOptions $codeActionLiteralSupport = null,
        /**
         * Whether code action supports the `isPreferred` property.
         *
         * @since 3.15.0
         */
        public readonly ?bool $isPreferredSupport = null,
        /**
         * Whether code action supports the `disabled` property.
         *
         * @since 3.16.0
         */
        public readonly ?bool $disabledSupport = null,
        /**
         * Whether code action supports the `data` property which is preserved
         * between a `textDocument/codeAction` and a `codeAction/resolve`
         * request.
         *
         * @since 3.16.0
         */
        public readonly ?bool $dataSupport = null,
        /**
         * Whether the client supports resolving additional code action
         * properties via a separate `codeAction/resolve` request.
         *
         * @since 3.16.0
         */
        public readonly ?ClientCodeActionResolveOptions $resolveSupport = null,
        /**
         * Whether the client honors the change annotations in text edits and
         * resource operations returned via the `CodeAction#edit` property by
         * for example presenting the workspace edit in the user interface and
         * asking for confirmation.
         *
         * @since 3.16.0
         */
        public readonly ?bool $honorsChangeAnnotations = null,
        /**
         * Whether the client supports documentation for a class of code
         * actions.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $documentationSupport = null,
        /**
         * Client supports the tag property on a code action. Clients supporting
         * tags have to handle unknown tags gracefully.
         *
         * @since 3.18.0 - proposed
         */
        public readonly ?CodeActionTagOptions $tagSupport = null,
    ) {}
}
