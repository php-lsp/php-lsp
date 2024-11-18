<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Result\Resolver;

/**
 * @template TExpectedInput of mixed = mixed
 * @template-covariant TOutput of mixed = mixed
 * @template-implements ResultResolverInterface<TExpectedInput, TOutput>
 */
abstract class ResultResolver implements ResultResolverInterface {}
