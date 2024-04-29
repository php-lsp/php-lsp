<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Printer;

use PhpParser\Node;
use PhpParser\Node\Stmt\Declare_ as PhpDeclareStatement;
use PhpParser\Node\Stmt\Enum_ as PhpEnumStatement;
use PhpParser\PrettyPrinter\Standard;

final class Per2Printer extends Standard
{
    protected function pStmt_Enum(PhpEnumStatement $node): string
    {
        return $this->pAttrGroups($node->attrGroups)
            . 'enum ' . $node->name
            . ($node->scalarType !== null ? ': ' . $this->p($node->scalarType) : '')
            . ($node->implements !== [] ? ' implements ' . $this->pCommaSeparated($node->implements) : '')
            . $this->nl . '{' . $this->pStmts($node->stmts) . $this->nl . '}';
    }

    protected function pStmt_Declare(PhpDeclareStatement $node): string
    {
        return 'declare(' . $this->pCommaSeparated($node->declares) . ')'
            . ($node->stmts !== null ? ' {' . $this->pStmts($node->stmts) . $this->nl . '}' : ';');
    }

    /**
     * Pretty prints an array of nodes (statements) and indents them optionally.
     *
     * @param array<array-key, Node> $nodes Array of nodes
     */
    protected function pStmts(array $nodes, bool $indent = \true) : string
    {
        if ($indent) {
            $this->indent();
        }

        $result = [];

        foreach ($nodes as $node) {
            if ($node instanceof Node\Stmt\Nop) {
                continue;
            }

            $statement = '';

            if (($comments = $node->getComments()) !== []) {
                $statement = $this->pComments($comments) . $this->nl;
            }

            $result[] = \str_repeat(' ', $this->indentLevel)
                . $statement . $this->p($node);
        }

        if ($indent) {
            $this->outdent();
        }

        return $this->nl . \implode($this->nl . $this->nl, $result);
    }
}
