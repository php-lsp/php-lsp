<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

use Lsp\Protocol\Type\TextDocumentContentChangePartial;
use Lsp\Protocol\Type\TextDocumentContentChangeWholeDocument;
use Phplrt\Contracts\Position\PositionFactoryInterface;
use Phplrt\Contracts\Source\ReadableInterface;
use Phplrt\Position\PositionFactory;

final class Document implements ReadableInterface
{
    /**
     * @var non-empty-string|null
     */
    public ?string $pathname {
        get {
            if (!\str_starts_with($this->uri->value, 'file://')) {
                return null;
            }

            $pathname = $this->uri->pathname;

            if ($pathname === null) {
                return null;
            }

            // Windows OS bugfix
            if (\str_starts_with($pathname, '/')
                && (\str_contains($pathname, '%3A/')
                || \str_contains($pathname, '%3A\\'))
            ) {
                $pathname = \substr($pathname, 1);
            }

            $pathname = \urldecode($pathname);

            // Direct access
            return \is_file($pathname) ? $pathname : null;
        }
    }

    public function __construct(
        public readonly Uri $uri,
        public private(set) string $text,
        public private(set) int $version = 0,
        private readonly PositionFactoryInterface $positions = new PositionFactory(),
    ) {}

    public function getStream()
    {
        $stream = \fopen('php://memory', 'w+');

        if ($stream === false) {
            throw new \RuntimeException('Cannot open stream');
        }

        \fwrite($stream, $this->text);
        \rewind($stream);

        return $stream;
    }

    public function getContents(): string
    {
        return $this->text;
    }

    public function getHash(): string
    {
        return \hash('md5', $this->text);
    }

    public function mayUpdate(int $version): bool
    {
        return $this->version < $version;
    }

    public function updateAll(TextDocumentContentChangeWholeDocument $change, int $version): void
    {
        if (!$this->mayUpdate($version)) {
            return;
        }

        $this->text = $change->text;
        $this->version = $version;
    }

    public function updatePartial(TextDocumentContentChangePartial $change, int $version): void
    {
        if (!$this->mayUpdate($version)) {
            return;
        }

        $from = $this->positions->createFromPosition(
            $this,
            \max(1, $change->range->start->line + 1),
            \max(1, $change->range->start->character + 1),
        );

        $to = $this->positions->createFromPosition(
            $this,
            \max(1, $change->range->end->line + 1),
            \max(1, $change->range->end->character + 1),
        );

        $this->text = \substr($this->text, 0, $from->getOffset())
            . $change->text
            . \substr($this->text, $to->getOffset());
    }
}
