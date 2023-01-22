<?php

declare(strict_types=1);

namespace Phpolar\StorageDriver;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Phpolar\StorageDriver\TypeName
 */
final class TypeNameTest extends TestCase
{
    public function typeNameCases(): Generator
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
        yield ["DateTime", TypeName::T_DateTime];
        yield ["DateTimeInterface", TypeName::T_DateTime];
        yield ["DateTimeImmutable", TypeName::T_DateTime];
        yield ["x", TypeName::Invalid];
        yield ["resource (closed)", TypeName::Invalid];
        yield ["unknown type", TypeName::Invalid];
        yield ["array", TypeName::Invalid];
    }

    /**
     * @testdox Shall parse string type
     * @dataProvider typeNameCases()
     */
    public function test1(string $givenStringTypeName, TypeName $expectedTypeName)
    {
        $parsedTypeName = TypeName::parse($givenStringTypeName);
        $this->assertEquals($expectedTypeName, $parsedTypeName);
    }
}
