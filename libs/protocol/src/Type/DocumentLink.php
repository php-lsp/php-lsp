<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A document link is a range in a text document that links to an internal or
 * external resource, like another text document or a web site.
 *
 * @generated 2024-11-15
 */
final class DocumentLink
{
    public function __construct(
        /**
         * The range this link applies to.
         */
        public readonly Range $range,
        /**
         * The uri this link points to. If missing a resolve request is sent
         * later.
         *
         * @var non-empty-string|null
         */
        public readonly ?string $target = null,
        /**
         * The tooltip text when you hover over this link.
         *
         * If a tooltip is provided, is will be displayed in a string that
         * includes instructions on how to trigger the link, such as `{0} (ctrl
         * + click)`. The specific instructions vary depending on OS,
         * user settings, and localization.
         *
         * @since 3.15.0
         */
        public readonly ?string $tooltip = null,
        /**
         * A data entry field that is preserved on a document link between a
         * DocumentLinkRequest and a DocumentLinkResolveRequest.
         */
        public readonly mixed $data = null,
    ) {}
}
