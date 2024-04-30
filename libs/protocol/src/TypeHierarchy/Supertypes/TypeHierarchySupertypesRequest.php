<?php

namespace Lsp\Protocol\TypeHierarchy\Supertypes;

/**
 * A request to resolve the supertypes for a given `TypeHierarchyItem`.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('typeHierarchy/supertypes')]
final class TypeHierarchySupertypesRequest {}
