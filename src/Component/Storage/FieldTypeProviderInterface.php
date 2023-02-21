<?php

declare(strict_types=1);

namespace App\Component\Storage;

interface FieldTypeProviderInterface
{
    public function get(string $name): FieldTypeInterface;
}
