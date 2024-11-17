<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class WorkspaceEditClientCapabilities
{
    public function __construct(
        /**
         * The client supports versioned document changes in `WorkspaceEdit`s.
         */
        public readonly ?bool $documentChanges = null,
        /**
         * The resource operations the client supports. Clients should at least
         * support 'create', 'rename' and 'delete' files and folders.
         *
         * @since 3.13.0
         *
         * @var list<ResourceOperationKind>|null
         */
        public readonly ?array $resourceOperations = null,
        /**
         * The failure handling strategy of a client if applying the workspace
         * edit fails.
         *
         * @since 3.13.0
         */
        public readonly ?FailureHandlingKind $failureHandling = null,
        /**
         * Whether the client normalizes line endings to the client specific
         * setting.
         * If set to `true` the client will normalize line ending characters in
         * a workspace edit to the client-specified new line character.
         *
         * @since 3.16.0
         */
        public readonly ?bool $normalizesLineEndings = null,
        /**
         * Whether the client in general supports change annotations on text
         * edits,
         * create file, rename file and delete file changes.
         *
         * @since 3.16.0
         */
        public readonly ?ChangeAnnotationsSupportOptions $changeAnnotationSupport = null,
        /**
         * Whether the client supports `WorkspaceEditMetadata` in
         * `WorkspaceEdit`s.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $metadataSupport = null,
        /**
         * Whether the client supports snippets as text edits.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $snippetEditSupport = null,
    ) {}
}
