<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class ShowMessageRequestParams
{
    public function __construct(
        /**
         * The message type. See {@link MessageType}.
         */
        public readonly MessageType $type,
        /**
         * The actual message.
         */
        public readonly string $message,
        /**
         * The message action items to present.
         *
         * @var list<MessageActionItem>|null
         */
        public readonly ?array $actions = null,
    ) {}
}
