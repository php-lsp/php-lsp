<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated deletes of
 * files.
 *
 * @generated
 * @since 3.16.0
 */
final class DeleteFilesParams
{
    /**
     * @generated
     * @since 3.16.0
     * @param list<FileDelete> $files
     */
    final public function __construct(
        public readonly array $files,
    ) {}
}
