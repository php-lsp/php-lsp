<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

enum Version: string implements VersionInterface
{
    case V3_17 = '3.17';
    case V3_18 = '3.18';

    public const STABLE = self::V3_17;
    public const LATEST = self::V3_18;

    public function getVersion(): string
    {
        return $this->value;
    }

    public function getPathname(): string
    {
        $pathname = __DIR__ . '/../resources/lsp/%s/metaModel.json';

        return \sprintf($pathname, $this->getVersion());
    }
}
