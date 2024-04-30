<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use Lsp\Protocol\Generator\Node\Notification;
use Lsp\Protocol\Generator\Node\Request;
use PhpParser\Modifiers;
use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_ as PhpClassStatement;

final class RequestNodeVisitor extends NotificationNodeVisitor
{
    protected function createNotificationAttribute(): PhpClassStatement
    {
        $attribute = parent::createNotificationAttribute();
        $attribute->flags += Modifiers::FINAL;
        $attribute->name = new Identifier('Request');
        $attribute->extends = new Name\FullyQualified('Lsp\Protocol\Notification');
        $attribute->stmts = [];

        return $attribute;
    }

    public function enterNode(PhpNodeInterface $node)
    {
        if ($node instanceof Request) {
            $this->add($this->createPhpNotificationStatement($node));
        }

        return null;
    }

    /**
     * @return non-empty-string
     */
    protected function createSuffixedNameFromMethod(Notification $notify): string
    {
        return $this->createNameFromMethod($notify) . 'Request';
    }

    protected function extendAttribute(Notification $notify, PhpClassStatement $statement): void
    {
        $statement->attrGroups = [new AttributeGroup([
            new Attribute(new Name\FullyQualified('Lsp\Protocol\Request'), [
                new Arg(new String_($notify->method)),
            ]),
        ])];
    }
}
