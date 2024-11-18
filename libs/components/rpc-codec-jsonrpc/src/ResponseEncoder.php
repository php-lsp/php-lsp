<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;

/**
 * @template-extends Encoder<ResponseInterface<mixed>>
 */
final class ResponseEncoder extends Encoder
{
    public function toArray(MessageInterface $message): array
    {
        // @phpstan-ignore-next-line
        assert($message instanceof ResponseInterface);

        $id = $message->getId();

        $data = match (true) {
            $message instanceof SuccessfulResponseInterface => $this->encodeSuccessfulResponse($message),
            $message instanceof FailureResponseInterface => $this->encodeFailureResponse($message),
            default => throw new \InvalidArgumentException(
                \sprintf('Unsupported response type: %s', $message::class),
            ),
        };

        return [
            'id' => $id->toPrimitive(),
            ...$data,
        ];
    }

    /**
     * @template TArgData of mixed
     *
     * @param FailureResponseInterface<mixed, TArgData> $response
     *
     * @return array{
     *     error: array{
     *         code: int,
     *         message: string,
     *         data: TArgData
     *     }
     * }
     */
    private function encodeFailureResponse(FailureResponseInterface $response): array
    {
        return [
            'error' => [
                'code' => $response->getCode(),
                'message' => $response->getMessage(),
                'data' => $response->getData(),
            ],
        ];
    }

    /**
     * @template TArgResult of mixed
     *
     * @param SuccessfulResponseInterface<mixed, TArgResult> $response
     *
     * @return array{
     *     result: TArgResult
     * }
     */
    private function encodeSuccessfulResponse(SuccessfulResponseInterface $response): array
    {
        return [
            'result' => $response->getResult(),
        ];
    }
}
