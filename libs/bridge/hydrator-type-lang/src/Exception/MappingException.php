<?php

declare(strict_types=1);

namespace Lsp\Hydrator\TypeLang\Exception;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;

final class MappingException extends \RuntimeException implements
    HydratorExceptionInterface {}
