<?php

declare(strict_types=1);

namespace Lsp\Workspace\File;

use Lsp\Workspace\Project\ProjectInterface;
use Lsp\Workspace\Uri\Uri;

/**
 * @template-extends \Traversable<array-key, VirtualFileInterface>
 */
interface VirtualFileInterface extends
    \Traversable,
    \Stringable,
    \Countable
{
    /**
     * Gets the name of this file.
     *
     * @api
     * @var non-empty-string
     */
    public string $name { get; }

    /**
     * Gets the path of this file.
     *
     * Path is a {@see non-empty-string} that uniquely identifies a file within
     * a given {@link ProjectInterface}.
     *
     * Format of the path is not depends on the concrete file system.
     *
     * For {@link ProjectInterface} it is an absolute file path with file
     * separator characters replaced to the forward slash ({@code '/'}).
     *
     * @api
     * @var non-empty-string
     */
    public string $path { get; }

    /**
     * Gets the extension of this file. If file name contains '.' extension is
     * the substring from the last '.' to the end of the name
     * (not including the '.'), otherwise extension is {@see null}.
     *
     * @api
     * @var non-empty-string|null
     */
    public ?string $extension { get; }

    /**
     * Gets the file name without the extension. If file name contains '.',
     * the substring till the last '.' is returned.
     *
     * Otherwise, the value of {@see $name} is returned.
     *
     * @api
     * @var non-empty-string|null
     */
    public ?string $nameWithoutExtension { get; }

    /**
     * Gets the file URI identifier.
     *
     * @api
     */
    public Uri $uri { get; }

    /**
     * Allows to force a virtual file system update if required.
     */
    public function refresh(): void;

    /**
     * Gets count of children elements.
     *
     * @return int<0, max>
     */
    public function count(): int;

    /**
     * Returns short string representation of this object.
     *
     * @return non-empty-string
     */
    public function __toString(): string;
}
