<?php

declare(strict_types=1);

namespace Lsp\Workspace\Uri;

final class UriFactory implements UriFactoryInterface
{
    /**
     * @param non-empty-string $uri
     */
    public function create(string $uri): Uri
    {
        $parts = \parse_url($uri);

        if (!\is_array($parts)) {
            $parts = ['path' => $uri];
        }

        return new Uri(
            path: $this->fetchPath($parts, $uri),
            type: $this->fetchScheme($parts),
        );
    }

    /**
     * @param array<array-key, mixed> $parts
     * @param non-empty-string $default
     * @return non-empty-string
     */
    private function fetchPath(array $parts, string $default): string
    {
        $host = $this->fetchUriPart($parts, 'host');
        $path = $this->fetchUriPart($parts, 'path');

        if ($host === null && $path === null) {
            return $default;
        }

        /** @var non-empty-string */
        return $host . $path;
    }

    /**
     * @param array<array-key, mixed> $parts
     * @return non-empty-lowercase-string|null
     */
    private function fetchScheme(array $parts): ?string
    {
        $scheme = $this->fetchUriPart($parts, 'scheme');

        if ($scheme !== null) {
            return \strtolower($scheme);
        }

        return null;
    }

    /**
     * @param array<array-key, mixed> $parts
     * @param non-empty-string $key
     * @return non-empty-string|null
     */
    private function fetchUriPart(array $parts, string $key): ?string
    {
        $isValidPart = isset($parts[$key])
            && \is_string($parts[$key])
            && $parts[$key] !== '';

        /** @var non-empty-string|null */
        return $isValidPart ? $parts[$key] : null;
    }
}
