<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class WorkDoneProgressBegin
{
    public function __construct(
        public readonly string $kind,
        /**
         * Mandatory title of the progress operation. Used to briefly inform
         * about the kind of operation being performed.
         *
         * Examples: "Indexing" or "Linking dependencies".
         */
        public readonly string $title,
        /**
         * Controls if a cancel button should show to allow the user to cancel
         * the long running operation. Clients that don't support cancellation
         * are allowed to ignore the setting.
         */
        public readonly ?bool $cancellable = null,
        /**
         * Optional, more detailed associated progress message. Contains
         * complementary information to the `title`.
         *
         * Examples: "3/25 files", "project/src/module2",
         * "node_modules/some_dep".
         * If unset, the previous progress message (if any) is still valid.
         */
        public readonly ?string $message = null,
        /**
         * Optional progress percentage to display (value 100 is considered
         * 100%).
         * If not provided infinite progress is assumed and clients are allowed
         * to ignore the `percentage` value in subsequent report notifications.
         *
         * The value should be steadily rising. Clients are free to ignore
         * values that are not following this rule. The value range is [0, 100].
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $percentage = null,
    ) {}
}
