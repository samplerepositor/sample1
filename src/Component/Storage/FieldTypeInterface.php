<?php

declare(strict_types=1);

namespace App\Component\Storage;

interface FieldTypeInterface
{
    public function validate(mixed $value): ?string;

    public function getName(): string;
}
