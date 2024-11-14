<?php

declare(strict_types=1);

namespace Lsp\Server\Address\Host;

/**
 * IP version 6 (IPv6) is a new version of the Internet Protocol,
 * designed as the successor to IP version 4 RFC-791.
 *
 * @api
 * @link https://datatracker.ietf.org/doc/html/rfc791
 * @link https://datatracker.ietf.org/doc/html/rfc2460
 */
final class IPv6 extends Host
{
    public function __toString(): string
    {
        return \sprintf('[%s]', $this->host);
    }
}
