<?php

declare(strict_types=1);

namespace Lsp\Server\React\Connection;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\Exception\DecodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;

/**
 * TODO Add max buffer size option.
 *
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Lsp\Server\React
 */
final class Buffer
{
    private string $buffer = '';

    /**
     * @var int<0, max>
     */
    private int $contentLength = 0;

    public function __construct(
        private readonly DecoderInterface $decoder,
    ) {}

    /**
     * @return iterable<array-key, MessageInterface>
     * @throws DecodingExceptionInterface
     */
    public function push(string $chunk): iterable
    {
        $this->buffer .= $chunk;

        return $this->decode();
    }

    /**
     * @return iterable<array-key, MessageInterface>
     * @throws DecodingExceptionInterface
     */
    private function decode(): iterable
    {
        do {
            $continue = false;

            // Empty content length means that
            // headers has not been decoded.
            if ($this->contentLength === 0 && !$this->decodeHeaders()) {
                // Force return in case headers are not decoded.
                return [];
            }

            // In case of content length is greater
            // than 0, we need to decode the body.
            if ($this->contentLength !== 0) {
                $message = $this->decodeBody();

                if ($message !== null) {
                    yield $message;

                    $continue = true;
                }
            }
        } while ($continue);
    }

    /**
     * @throws DecodingExceptionInterface
     */
    private function decodeBody(): ?MessageInterface
    {
        // Buffer is waiting for data
        if (\strlen($this->buffer) < $this->contentLength) {
            return null;
        }

        $message = \substr($this->buffer, 0, $this->contentLength);

        $this->buffer = \substr($this->buffer, $this->contentLength);
        $this->contentLength = 0;

        return $this->decoder->decode($message);
    }

    private function decodeHeaders(): bool
    {
        $offset = \strpos($this->buffer, "\r\n\r\n");

        if ($offset === false) {
            return false;
        }

        $headers = \substr($this->buffer, 0, $offset);
        $this->buffer = \substr($this->buffer, $offset + 4);

        foreach ($this->splitHeaders($headers) as $key => $value) {
            if ($key === 'content-length' && \is_numeric($value)) {
                $this->contentLength = \max(0, (int) $value);

                return true;
            }
        }

        return false;
    }

    /**
     * @return iterable<lowercase-string, string>
     */
    private function splitHeaders(string $data): iterable
    {
        $lines = \explode("\n", $data);

        foreach ($lines as $line) {
            $offset = \strpos($line, ':');

            // Skip broken header line (?)
            if ($offset === false) {
                continue;
            }

            $headerKey = \substr($line, 0, $offset);
            $headerValue = \substr($line, $offset + 1);

            yield \strtolower(\trim($headerKey)) => \trim($headerValue);
        }
    }
}
