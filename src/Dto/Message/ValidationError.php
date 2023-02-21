<?php

declare(strict_types=1);

namespace App\Dto\Message;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationError extends AbstractMessage
{
    public function __construct(ConstraintViolationListInterface $validationErrors)
    {
        $property = $validationErrors->get(0)
            ->getPropertyPath();
        $message = $validationErrors->get(0)
            ->getMessage();
        $this->message = sprintf('%s: %s', $property, $message);
    }
}
