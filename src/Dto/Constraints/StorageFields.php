<?php

declare(strict_types=1);

namespace App\Dto\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute(Attribute::TARGET_PROPERTY)]
class StorageFields extends Constraint
{
    public array $allowedKeys = [
        'name',
        'type',
        'identity',
    ];

    public string $invalidFieldsStruct = 'This array has invalid format.';

    public string $identityMissing = 'Missing at least one identity field.';
}
