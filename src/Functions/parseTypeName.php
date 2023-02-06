<?php

declare(strict_types=1);

use Phpolar\StorageDriver\TypeName;

/**
 * Convert a string into a TypeName
 */
function parseTypeName(string $str): TypeName
{
    return match ($str) {
        "string" => TypeName::T_String,
        "int", "integer" => TypeName::T_Int,
        "double", "float" => TypeName::T_Float,
        "bool", "boolean" => TypeName::T_Bool,
        "null", "NULL" => TypeName::T_Null,
        "resource" => TypeName::T_Resource,
        DateTimeInterface::class, DateTime::class, DateTimeImmutable::class =>
        TypeName::T_DateTime,
        default => TypeName::Invalid,
    };
}
