<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Printer;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_ as PhpClassStatement;
use PhpParser\Node\Stmt\ClassMethod as PhpClassMethodStatement;
use PhpParser\Node\Stmt\Declare_ as PhpDeclareStatement;
use PhpParser\Node\Stmt\Enum_ as PhpEnumStatement;

final class Per2PhpPrinter extends PhpPrinter
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

    protected function pStmt_ClassMethod(PhpClassMethodStatement $node): string
    {
        $parameters = $this->pMaybeMultiline(
            nodes: $node->params,
            trailingComma: $this->phpVersion->supportsTrailingCommaInParamList(),
        );

        $typeHint = $node->returnType !== null ? ': ' . $this->p($node->returnType) : '';

        $result = $this->pAttrGroups($node->attrGroups)
            . $this->pModifiers($node->flags)
            . 'function ' . ($node->byRef ? '&' : '') . $node->name
            . '(' . $parameters . ')'
            . $typeHint;

        if ($node->stmts === null) {
            return $result . ';';
        }

        if ($node->stmts === []) {
            return $result . ' {}';
        }

        if (\str_contains($parameters, $this->nl)) {
            $result .= ' {';
        } else {
            $result .= $this->nl . '{';
        }

        return $result . $this->pStmts($node->stmts)
            . $this->nl
            . '}';
    }

    protected function pClassCommon(PhpClassStatement $node, string $afterClassToken): string
    {
        $result = $this->pAttrGroups($node->attrGroups, $node->name === null)
            . $this->pModifiers($node->flags)
            . 'class' . $afterClassToken
            . ($node->extends !== null ? ' extends ' . $this->p($node->extends) : '')
            . ($node->implements === [] ? '' : ' implements ' . $this->pCommaSeparated($node->implements))
            . $this->nl;

        if ($node->stmts === []) {
            return $result . '{}';
        }

        return $result . '{' . $this->pStmts($node->stmts) . $this->nl . '}';
    }

    protected function pMaybeMultiline(array $nodes, bool $trailingComma = false): string
    {
        if ($this->hasPromotedProperties($nodes)
            || $this->hasNodeWithComments($nodes)
            || \count($nodes) > 3) {
            return $this->pCommaSeparatedMultiline($nodes, $trailingComma) . $this->nl;
        }

        return $this->pCommaSeparated($nodes);
    }

    /**
     * @param array<array-key, Node> $nodes
     */
    private function hasPromotedProperties(array $nodes): bool
    {
        foreach ($nodes as $node) {
            if ($node instanceof Node\Param && $node->isPromoted()) {
                return true;
            }
        }

        return false;
    }
}
