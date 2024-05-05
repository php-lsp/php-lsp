<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated creation of
 * files.
 *
 * @generated
 * @since 3.16.0
 */
final class CreateFilesParams
{
    /**
     * @generated
     * @since 3.16.0
     * @param list<FileCreate> $files
     */
    final public function __construct(
        public readonly array $files,
    ) {}
}
