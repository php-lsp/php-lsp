<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents an incoming call, e.g. a caller of a method or constructor.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class CallHierarchyIncomingCall
{
    public function __construct(
        /**
         * The item that makes the call.
         */
        public readonly CallHierarchyItem $from,
        /**
         * The ranges at which the calls appear. This is relative to the caller
         * denoted by {@see CallHierarchyIncomingCall::$from `this.from`}.
         *
         * @var list<Range>
         */
        public readonly array $fromRanges = [],
    ) {}
}
