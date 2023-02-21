<?php

declare(strict_types=1);

namespace App\Dto\Response;

abstract class AbstractResponse
{
    abstract public function toArray(): array;
}
