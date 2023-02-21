<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;

class StrategyNotFoundException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct(sprintf('Strategy with name `%s` not found.', $name));
    }
}
