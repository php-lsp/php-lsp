<?php

namespace Lsp\Protocol\Type;

trait StaticRegistrationOptionsMixin
{
    /**
     * The id used to register the request. The id can be used to deregister
     * the request again. See also Registration#id.
     *
     * @generated
     */
    public string|null $id = null;
}