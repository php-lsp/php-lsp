<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated creation of
 * files.
 *
 * @since 3.16.0
 */
final class CreateFilesParams
{
    public function __construct(
        /**
         * An array of all files/folders created in this operation.
         *
         * @var list<FileCreate>
         */
        public readonly array $files = [],
    ) {}
}
