<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\Request;

/**
 * @template-extends Hydrator<Request, array<array-key, mixed>>
 */
final class RequestHydrator extends Hydrator
{
    public function __construct(
        public readonly TypeHydrator $types,
    ) {}

    public function hydrate(array $data): Request
    {
        $params = $data['params'] ?? null;

        return new Request(
            method: $data['method'],
            // @phpstan-ignore-next-line
            params: match (true) {
                $params === null => null,
                // @phpstan-ignore-next-line
                \array_is_list($params) => $this->types->hydrateAll($params),
                // @phpstan-ignore-next-line
                default => $this->types->hydrate($params),
            },
            result: $this->types->hydrate($data['result']),
            partialResult: $this->types->hydrateOrNull($data['partialResult'] ?? null),
            errorData: $this->types->hydrateOrNull($data['errorData'] ?? null),
            registrationMethod: $data['registrationMethod'] ?? null,
            registrationOptions: $this->types->hydrateOrNull($data['registrationOptions'] ?? null),
            messageDirection: Request\MessageDirection::from($data['messageDirection']),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
