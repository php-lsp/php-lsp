<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

abstract class Definition extends Node
{
    /**
     * @param non-empty-string|null $documentation an optional documentation
     * @param non-empty-string|null $since Since when (release number) this
     *        notification is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed notification.
     *        If omitted the notification is final.
     * @param non-empty-string|null $deprecated Whether the notification is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public ?string $documentation,
        public ?string $since,
        public ?bool $proposed,
        public ?string $deprecated,
    ) {
        parent::__construct();
    }
}
