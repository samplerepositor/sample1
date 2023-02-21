<?php

declare(strict_types=1);

namespace App\Dto\Message;

use Throwable;

class BadRequestError extends AbstractMessage
{
    public function __construct(Throwable $throwable)
    {
        $this->message = $throwable->getMessage();
    }
}
