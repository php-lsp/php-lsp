<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Request;

enum MessageDirection: string
{
    case CLIENT_TO_SERVER = 'clientToServer';
    case SERVER_TO_CLIENT = 'serverToClient';
    case BOTH = 'both';
}
