<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;

class InputTypeNotFoundException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct(sprintf('Input type `%s` not found.', $name));
    }
}
