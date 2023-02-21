<?php

declare(strict_types=1);

namespace App\Dto\Message;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMessage
{
    protected string $message = '';

    protected int $code = Response::HTTP_BAD_REQUEST;

    public function __toString(): string
    {
        return $this->message;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}
