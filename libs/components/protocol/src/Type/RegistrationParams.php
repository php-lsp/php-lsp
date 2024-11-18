<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class RegistrationParams
{
    public function __construct(
        /**
         * @var list<Registration>
         */
        public readonly array $registrations = [],
    ) {}
}
