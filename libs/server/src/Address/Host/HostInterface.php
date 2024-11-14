<?php

declare(strict_types=1);

namespace Lsp\Server\Address\Host;

interface HostInterface extends \Stringable
{
    /**
     * Returns the host as a string.
     *
     * The value returned MUST be normalized to lowercase,
     * per RFC-3986 (Section 3.2.2).
     *
     * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
     *
     * @return non-empty-lowercase-string
     */
    public function __toString(): string;
}
