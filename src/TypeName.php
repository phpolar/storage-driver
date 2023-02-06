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
}
