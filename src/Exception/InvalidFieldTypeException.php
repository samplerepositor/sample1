<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;

class InvalidFieldTypeException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct(sprintf('Invalid field type `%s`.', $name));
    }
}
