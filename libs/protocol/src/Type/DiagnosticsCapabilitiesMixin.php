<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * General diagnostics capabilities for pull and push model.
 *
 * @generated 2024-11-14
 */
trait DiagnosticsCapabilitiesMixin
{
    /**
     * Whether the clients accepts diagnostics with related information.
     *
     * @readonly
     */
    public ?bool $relatedInformation = null;
    /**
     * Client supports the tag property to provide meta data about a diagnostic.
     * Clients supporting tags have to handle unknown tags gracefully.
     *
     * @since 3.15.0
     *
     * @readonly
     */
    public ?ClientDiagnosticsTagOptions $tagSupport = null;
    /**
     * Client supports a codeDescription property.
     *
     * @since 3.16.0
     *
     * @readonly
     */
    public ?bool $codeDescriptionSupport = null;
    /**
     * Whether code action supports the `data` property which is preserved
     * between a `textDocument/publishDiagnostics` and `textDocument/codeAction`
     * request.
     *
     * @since 3.16.0
     *
     * @readonly
     */
    public ?bool $dataSupport = null;
}
