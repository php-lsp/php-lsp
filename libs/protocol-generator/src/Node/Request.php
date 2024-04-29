<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Request\MessageDirection;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents a LSP request.
 */
final class Request
{
    /**
     * @param non-empty-string $method The request's method name.
     * @param TypeInterface|list<TypeInterface>|null $params The parameter
     *        type(s) if any.
     * @param TypeInterface $result The result type.
     * @param TypeInterface|null $partialResult Optional partial result type if
     *        the request supports partial result reporting.
     * @param TypeInterface|null $errorData An optional error data type.
     * @param non-empty-string|null $registrationMethod Optional a dynamic
     *        registration method if it different from the request's method.
     * @param TypeInterface|null $registrationOptions Optional registration
     *        options if the request supports dynamic registration.
     * @param MessageDirection $messageDirection The direction in which this
     *        request is sent in the protocol.
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        request is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed feature. If omitted
     *        the feature is final.
     * @param non-empty-string|null $deprecated Whether the request is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public readonly string $method,
        public readonly TypeInterface|array|null $params,
        public readonly TypeInterface $result,
        public readonly ?TypeInterface $partialResult,
        public readonly ?TypeInterface $errorData,
        public readonly ?string $registrationMethod,
        public readonly ?TypeInterface $registrationOptions,
        public readonly MessageDirection $messageDirection,
        public readonly ?string $documentation,
        public readonly ?string $since,
        public readonly ?bool $proposed,
        public readonly ?string $deprecated,
    ) {}
}
