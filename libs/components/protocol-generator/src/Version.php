<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

enum Version: string implements VersionInterface
{
    case V3_17 = '3.17';
    case V3_18 = '3.18';

    /**
     * @api
     */
    public const STABLE = self::V3_17;

    /**
     * @api
     */
    public const LATEST = self::V3_18;

    public function getVersion(): string
    {
        return $this->value;
    }
}
