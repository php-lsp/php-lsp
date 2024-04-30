<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use Lsp\Protocol\Generator\Node\Notification;
use Lsp\Protocol\Generator\Node\Request;
use Lsp\Protocol\Generator\Support\DocCommentBuilder;
use PhpParser\Comment\Doc;
use PhpParser\Modifiers;
use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_ as PhpClassStatement;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\ClassMethod;

class NotificationNodeVisitor extends NodeVisitor
{
    public function beforeTraverse(array $nodes)
    {
        $this->add($this->createNotificationAttribute());

        return null;
    }

    protected function createNotificationAttribute(): PhpClassStatement
    {
        $statement = new PhpClassStatement(new Identifier('Notification'));
        $statement->attrGroups = [new AttributeGroup([
            new Attribute(new Name\FullyQualified(\Attribute::class), [
                new Arg(new ClassConstFetch(
                    class: new Name\FullyQualified(\Attribute::class),
                    name: new Identifier('TARGET_CLASS'),
                )),
            ]),
        ])];

        $method = new ClassMethod('__construct');
        $method->flags += Modifiers::PUBLIC;
        $method->params = [new Param(
            var: new Variable('method'),
            type: new Identifier('string'),
            flags: Modifiers::PUBLIC | Modifiers::READONLY,
        )];
        $method->setDocComment(new Doc(<<<'PHPDOC'
            /**
             * @param non-empty-string $method
             */
            PHPDOC));

        $statement->stmts = [$method];

        return $statement;
    }

    public function enterNode(PhpNodeInterface $node)
    {
        if ($node instanceof Notification && !$node instanceof Request) {
            $this->add($this->createPhpNotificationStatement($node));
        }

        return null;
    }

    protected function createNamespaceFor(ClassLike $stmt): Name
    {
        $method = $stmt->getAttribute('method');

        if (!\is_string($method)) {
            return parent::createNamespaceFor($stmt);
        }

        $namespace = \ucfirst(\ltrim($method, '$/'));
        $namespace = \preg_replace_callback('/\/([a-z])/ium', function (array $data): string {
            return '\\' . \strtoupper($data[1]);
        }, $namespace);

        return new Name('Lsp\Protocol\\' . $namespace);
    }

    /**
     * @return non-empty-string
     */
    protected function createSuffixedNameFromMethod(Notification $notify): string
    {
        return $this->createNameFromMethod($notify) . 'Notification';
    }

    /**
     * @return non-empty-string
     */
    protected function createNameFromMethod(Notification $notify): string
    {
        $name = (string) \preg_replace_callback('/\/([a-z])/iu', function (array $parts) {
            return \ucfirst($parts[1]);
        }, $notify->method);

        $name = (string) \preg_replace('/\W/', '', $name);

        /** @var non-empty-string */
        return \ucfirst($name);
    }

    protected function createPhpNotificationStatement(Notification $notify): PhpClassStatement
    {
        $statement = new PhpClassStatement($this->createSuffixedNameFromMethod($notify));
        $statement->setAttribute('method', $notify->method);
        $statement->flags += Modifiers::FINAL;

        $statement->setDocComment(DocCommentBuilder::build(
            documentation: $notify->documentation,
            tags: [
                'since' => $notify->since,
                'deprecated' => $notify->deprecated,
                'internal' => $notify->proposed === true ? 'This notification class is not standardized' : null,
            ],
        ));

        $this->extendAttribute($notify, $statement);
        $this->extendBody($notify, $statement);

        return $statement;
    }

    protected function extendAttribute(Notification $notify, PhpClassStatement $statement): void
    {
        $statement->attrGroups = [new AttributeGroup([
            new Attribute(new Name\FullyQualified('Lsp\Protocol\Notification'), [
                new Arg(new String_($notify->method)),
            ]),
        ])];
    }

    protected function extendBody(Notification $notify, PhpClassStatement $statement): void
    {
        // NOOP
    }
}
