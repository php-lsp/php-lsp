<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated creation of
 * files.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class CreateFilesParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<FileCreate> $files
     */
    final public function __construct(
        public readonly array $files,
    ) {}
}
