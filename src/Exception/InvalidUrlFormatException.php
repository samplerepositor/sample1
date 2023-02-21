<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;

class InvalidUrlFormatException extends Exception
{
    public function __construct(string $url)
    {
        parent::__construct(sprintf('Invalid URL format: %s.', $url));
    }
}
