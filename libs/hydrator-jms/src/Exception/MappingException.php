<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS\Exception;

use Lsp\Contracts\Hydrator\Exception\MappingExceptionInterface;

class MappingException extends \RuntimeException implements MappingExceptionInterface
{
    final public const ERROR_CODE_VALUE_NOT_PASSED = 0x01;

    final public const ERROR_CODE_VALUE_INVALID = 0x02;

    final public const ERROR_CODE_VALUE_OF_FIELD_NOT_PASSED = 0x03;

    final public const ERROR_CODE_VALUE_OF_FIELD_INVALID = 0x04;

    protected const ERROR_CODE_LAST = self::ERROR_CODE_VALUE_OF_FIELD_INVALID;

    private Context $context;

    final public function __construct(
        Context $context,
        string $message,
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        $this->context = $context;

        parent::__construct($message, $code, $previous);
    }

    public static function fromContext(Context $context): self
    {
        if ($context->actual === null) {
            return static::fromNonPassedValue($context);
        }

        return static::fromInvalidValue($context);
    }

    protected static function fromNonPassedValue(Context $context): self
    {
        $message = 'The required value of type "%s" has not been passed';
        $message = \sprintf($message, $context->expected);

        return new static($context, $message, self::ERROR_CODE_VALUE_NOT_PASSED);
    }

    protected static function fromInvalidValue(Context $context): self
    {
        $message = 'The value should be of type "%s", but "%s" were passed';
        $message = \sprintf($message, $context->expected, $context->actual ?? 'null');

        return new static($context, $message, self::ERROR_CODE_VALUE_INVALID);
    }

    /**
     * @param non-empty-string $field
     */
    public static function fromContextOfField(Context $context, string $field): self
    {
        if ($context->actual === null) {
            return static::fromNonPassedValueOfField($context, $field);
        }

        return static::fromInvalidValueOfField($context, $field);
    }

    protected static function fromNonPassedValueOfField(Context $context, string $field): self
    {
        $message = 'The required field "%s" of type "%s" has not been passed';
        $message = \sprintf($message, $field, $context->expected);

        return new static($context, $message, self::ERROR_CODE_VALUE_OF_FIELD_NOT_PASSED);
    }

    protected static function fromInvalidValueOfField(Context $context, string $field): self
    {
        $message = 'The required field "%s" should be of type "%s", but "%s" were passed';
        $message = \sprintf($message, $field, $context->expected, $context->actual ?? 'null');

        return new static($context, $message, self::ERROR_CODE_VALUE_OF_FIELD_INVALID);
    }

    public function getPath(): array
    {
        return $this->context->path;
    }

    public function getExpectedType(): string
    {
        return $this->context->expected;
    }

    public function getActualType(): ?string
    {
        return $this->context->actual;
    }
}
