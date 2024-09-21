<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Rename file operation.
 *
 * @generated 2024-09-21
 */
final class RenameFile
{
    use ResourceOperationMixin;

    /**
     * @param string $kind the resource operation kind
     * @param string|null $annotationId an optional annotation identifier
     *        describing the operation
     */
    public function __construct(
        string $kind,
        /**
         * The old (existing) location.
         *
         * @var non-empty-string
         */
        public readonly string $oldUri,
        /**
         * The new location.
         *
         * @var non-empty-string
         */
        public readonly string $newUri,
        /**
         * Rename options.
         */
        public readonly ?RenameFileOptions $options = null,
        ?string $annotationId = null,
    ) {
        $this->kind = $kind;
        $this->annotationId = $annotationId;
    }
}
