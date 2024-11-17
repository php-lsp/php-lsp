<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class FileSystemWatcher
{
    public function __construct(
        /**
         * The glob pattern to watch. See {@link GlobPattern glob pattern} for
         * more detail.
         *
         * @since 3.17.0 support for relative patterns.
         */
        public readonly RelativePattern|string $globPattern,
        /**
         * The kind of events of interest. If omitted it defaults to
         * WatchKind.Create | WatchKind.Change | WatchKind.Delete which is 7.
         */
        public readonly ?WatchKind $kind = null,
    ) {}
}
