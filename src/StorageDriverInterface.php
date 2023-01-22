<?php

declare(strict_types=1);

namespace Phpolar\StorageDriver;

use Stringable;

interface StorageDriverInterface
{
  public function getDataType(TypeName $typeName): Stringable|DataTypeUnknown;
}
