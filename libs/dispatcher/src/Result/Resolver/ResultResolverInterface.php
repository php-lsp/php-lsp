<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Result\Resolver;

/**
 * @template TExpectedInput of mixed = mixed
 * @template-covariant TOutput of mixed = mixed
 */
interface ResultResolverInterface
{
    /**
     * @return ($value is TExpectedInput ? bool : false)
     */
    public function supports(mixed $value): bool;

    /**
     * @param TExpectedInput $value
     * @return TOutput
     */
    public function resolve(mixed $value): mixed;
}
