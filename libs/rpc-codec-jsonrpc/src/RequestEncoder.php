<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;

/**
 * @template-extends Encoder<NotificationInterface>
 */
final class RequestEncoder extends Encoder
{
    public function toArray(MessageInterface $message): array
    {
        // @phpstan-ignore-next-line
        assert($message instanceof NotificationInterface);

        if ($message instanceof RequestInterface) {
            return $this->requestToArray($message);
        }

        return $this->notificationToArray($message);
    }

    /**
     * @return array{
     *     method: non-empty-string,
     *     params: array<array-key, mixed>
     * }
     */
    private function notificationToArray(NotificationInterface $notification): array
    {
        return [
            'method' => $notification->getMethod(),
            'params' => $notification->getParameters(),
        ];
    }

    /**
     * @template TArgIdentifier of mixed
     *
     * @param RequestInterface<TArgIdentifier> $request
     *
     * @return array{
     *     id: TArgIdentifier,
     *     method: non-empty-string,
     *     params: array<array-key, mixed>
     * }
     */
    private function requestToArray(RequestInterface $request): array
    {
        $id = $request->getId();

        return [
            'id' => $id->toPrimitive(),
            ...$this->notificationToArray($request),
        ];
    }
}
