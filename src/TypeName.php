<?php

declare(strict_types=1);

namespace Phpolar\StorageDriver;

/**
 * Contains names of types defined in the programming language.
 */
enum TypeName
{
    case T_String;
    case T_Int;
    case T_Float;
    case T_Bool;
    case T_Null;
    case T_DateTime;
    case T_Resource;
    case Invalid;

    /**
     * Convert a string into a TypeName
     */
    public static function parse(string $str): TypeName
    {
        return match ($str) {
            "string" => TypeName::T_String,
            "int", "integer" => TypeName::T_Int,
            "double", "float" => TypeName::T_Float,
            "bool", "boolean" => TypeName::T_Bool,
            "null", "NULL" => TypeName::T_Null,
            "resource" => TypeName::T_Resource,
            "DateTimeInterface", "DateTimeImmutable", "DateTime" =>
            TypeName::T_DateTime,
            default => TypeName::Invalid,
        };
    }
}
