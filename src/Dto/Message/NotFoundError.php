<?php

declare(strict_types=1);

namespace App\Dto\Message;

use Symfony\Component\HttpFoundation\Response;
use Throwable;

class NotFoundError extends AbstractMessage
{
    protected int $code = Response::HTTP_NOT_FOUND;

    public function __construct(Throwable $throwable)
    {
        $this->message = $throwable->getMessage();
    }
}
