<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 */
final class SemanticTokensClientCapabilities
{
    public function __construct(
        /**
         * Which requests the client supports and might send to the server
         * depending on the server's capability. Please note that clients might
         * not show semantic tokens or degrade some of the user experience if a
         * range or full request is advertised by the client but not provided by
         * the server. If for example the client capability `requests.full` and
         * `request.range` are both set to true but the server only provides a
         * range provider the client might not render a minimap correctly or
         * might even decide to not show any semantic tokens at all.
         */
        public readonly ClientSemanticTokensRequestOptions $requests,
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `(TextDocumentRegistrationOptions & StaticRegistrationOptions)`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The token types that the client supports.
         *
         * @var list<string>
         */
        public readonly array $tokenTypes = [],
        /**
         * The token modifiers that the client supports.
         *
         * @var list<string>
         */
        public readonly array $tokenModifiers = [],
        /**
         * The token formats the clients supports.
         *
         * @var list<TokenFormat>
         */
        public readonly array $formats = [],
        /**
         * Whether the client supports tokens that can overlap each other.
         */
        public readonly ?bool $overlappingTokenSupport = null,
        /**
         * Whether the client supports tokens that can span multiple lines.
         */
        public readonly ?bool $multilineTokenSupport = null,
        /**
         * Whether the client allows the server to actively cancel a semantic
         * token request, e.g. supports returning LSPErrorCodes.ServerCancelled.
         * If a server does the client needs to retrigger the request.
         *
         * @since 3.17.0
         */
        public readonly ?bool $serverCancelSupport = null,
        /**
         * Whether the client uses semantic tokens to augment existing syntax
         * tokens. If set to `true` client side created syntax tokens and
         * semantic tokens are both used for colorization. If set to `false` the
         * client only uses the returned semantic tokens for colorization.
         *
         * If the value is `undefined` then the client behavior is not
         * specified.
         *
         * @since 3.17.0
         */
        public readonly ?bool $augmentsSyntaxTokens = null,
    ) {}
}
