<?php

declare(strict_types=1);

namespace Lsp\Workspace\Project;

use Lsp\Workspace\File\VirtualFileInterface;
use Lsp\Workspace\Uri\Uri;

/**
 * @template-extends \Traversable<array-key, VirtualFileInterface>
 */
interface ProjectInterface extends \Traversable, \Countable
{
    /**
     * Gets the name of the project.
     *
     * @api
     * @var non-empty-string
     */
    public string $name { get; }

    /**
     * Gets the path of this project.
     *
     * This is an absolute file path with file separator characters replaced
     * to the forward slash ({@code '/'}).
     *
     * @api
     * @var non-empty-string
     */
    public string $path { get; }

    /**
     * Gets the project URI identifier.
     *
     * @api
     */
    public Uri $uri { get; }

    /**
     * Gets count of children elements.
     *
     * @return int<0, max>
     */
    public function count(): int;
}
