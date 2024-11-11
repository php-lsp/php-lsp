<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Node;

final class IRDocument extends IRNode
{
    /**
     * @param array<non-empty-lowercase-string, IRStatement> $statements
     */
    public function __construct(
        public array $statements = [],
    ) {
        parent::__construct();
    }

    /**
     * @param non-empty-string $name
     */
    public function find(string $name): ?IRStatement
    {
        return $this->statements[$name] ?? null;
    }

    public function replace(IRStatement $from, IRStatement $to): void
    {
        $this->remove($from);
        $this->add($to);
    }

    public function remove(IRStatement $stmt): void
    {
        unset($this->statements[$stmt->name]);
    }

    public function add(IRStatement $stmt): void
    {
        $this->statements[$stmt->name] = $stmt;
    }
}
