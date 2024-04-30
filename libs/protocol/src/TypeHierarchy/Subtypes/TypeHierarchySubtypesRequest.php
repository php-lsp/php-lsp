<?php

namespace Lsp\Protocol\TypeHierarchy\Subtypes;

/**
 * A request to resolve the subtypes for a given `TypeHierarchyItem`.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('typeHierarchy/subtypes')]
final class TypeHierarchySubtypesRequest {}
