<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\Exception;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;

class DependencyRequiredException extends ProtocolException
{
    final public const CODE_NO_REQUEST_FACTORY = 0x01;

    final public const CODE_NO_RESPONSE_FACTORY = 0x02;

    final public const CODE_NO_ID_FACTORY = 0x03;

    protected const ERROR_CODE_LAST = self::CODE_NO_ID_FACTORY;

    /**
     * @param non-empty-string $interface
     * @param non-empty-string $package
     */
    protected static function fromMissingFactoryImplementation(string $interface, string $package, int $code): static
    {
        $message = 'Unable to find available factory implementation: '
            . 'Please specify the %s explicitly or install the "%s" package';
        $message = \sprintf($message, $interface, $package);

        return new static($message, $code);
    }

    public static function fromMissingRequestFactoryImplementation(): static
    {
        return static::fromMissingFactoryImplementation(
            RequestFactoryInterface::class,
            'php-lsp/rpc-message-factory',
            self::CODE_NO_REQUEST_FACTORY,
        );
    }

    public static function fromMissingResponseFactoryImplementation(): static
    {
        return static::fromMissingFactoryImplementation(
            ResponseFactoryInterface::class,
            'php-lsp/rpc-message-factory',
            self::CODE_NO_RESPONSE_FACTORY,
        );
    }

    public static function fromMissingIdFactoryImplementation(): static
    {
        return static::fromMissingFactoryImplementation(
            IdFactoryInterface::class,
            'php-lsp/rpc-message-factory',
            self::CODE_NO_ID_FACTORY,
        );
    }
}
