<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\IdFactory;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Rpc\Message\Factory\Exception\IdOverflowException;
use Lsp\Rpc\Message\Factory\IdFactory;
use Lsp\Rpc\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;

/**
 * @template TInteger of int
 * @template-implements GeneratorInterface<TInteger>
 */
abstract class IntGenerator implements GeneratorInterface
{
    /**
     * @var TInteger
     */
    protected int $current;

    /**
     * @var TInteger
     */
    private readonly int $initial;

    /**
     * @var TInteger
     */
    private readonly int $maximum;

    public function __construct(
        private readonly IdFactoryInterface $ids = new IdFactory(),
        private readonly OverflowBehaviour $onOverflow = OverflowBehaviour::RESET,
    ) {
        $this->current = $this->initial = $this->getInitialValue();
        $this->maximum = $this->getMaximalValue();
    }

    /**
     * @return TInteger
     */
    abstract public function getInitialValue(): int;

    /**
     * @return TInteger
     */
    abstract public function getMaximalValue(): int;

    /**
     * @throws IdOverflowException
     */
    protected function reset(): void
    {
        if ($this->onOverflow === OverflowBehaviour::EXCEPTION) {
            throw IdOverflowException::fromMaxValueOfClass(static::class, (string) $this->current);
        }

        $this->current = $this->initial;
    }

    /**
     * @return IdInterface<TInteger>
     * @throws IdOverflowException
     * @throws \Throwable
     */
    public function nextId(): IdInterface
    {
        /**
         * @var TInteger $value
         */
        $value = ++$this->current;

        if ($value >= $this->maximum) {
            $this->reset();
        }

        /** @var IdInterface<TInteger> */
        return $this->ids->create($value);
    }
}
