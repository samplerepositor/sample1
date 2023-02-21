<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;

class ProviderNotFoundException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct(sprintf('Provider with name `%s` not found.', $name));
    }
}
