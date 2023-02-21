<?php

declare(strict_types=1);

namespace App\Dto\Request\Provider;

use Symfony\Component\Validator\Constraints as Assert;

class ProviderRequest
{
    #[Assert\NotNull, Assert\Type('string')]
    public readonly mixed $name;

    #[Assert\NotNull, Assert\Type('string')]
    public readonly mixed $url;
}
