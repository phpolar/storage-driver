<?php

declare(strict_types=1);

namespace Phpolar\StorageDriver;

use \DateTime;
use \DateTimeImmutable;
use \DateTimeInterface;
use Generator;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;


#[CoversFunction('parseTypeName')]
final class TypeNameTest extends TestCase
{
    public static function typeNameCases(): Generator
    {
        yield ["string", TypeName::T_String];
        yield ["int", TypeName::T_Int];
        yield ["integer", TypeName::T_Int];
        yield ["float", TypeName::T_Float];
        yield ["double", TypeName::T_Float];
        yield ["null", TypeName::T_Null];
        yield ["NULL", TypeName::T_Null];
        yield ["bool", TypeName::T_Bool];
        yield ["boolean", TypeName::T_Bool];
        yield ["resource", TypeName::T_Resource];
        yield [DateTime::class, TypeName::T_DateTime];
        yield [DateTimeInterface::class, TypeName::T_DateTime];
        yield [DateTimeImmutable::class, TypeName::T_DateTime];
        yield ["x", TypeName::Invalid];
        yield ["resource (closed)", TypeName::Invalid];
        yield ["unknown type", TypeName::Invalid];
        yield ["array", TypeName::Invalid];
    }

    #[DataProvider('typeNameCases')]
    public function test1(string $givenStringTypeName, TypeName $expectedTypeName)
    {
        $parsedTypeName = parseTypeName($givenStringTypeName);
        $this->assertEquals($expectedTypeName, $parsedTypeName);
    }
}
