<?php

declare(strict_types=1);

namespace Lsp\Hydrator\Bridge\TypeLang\Exception;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;

final class MappingException extends \RuntimeException implements
    HydratorExceptionInterface {}
