<?php

declare(strict_types=1);

namespace App\Dto\Response\Provider;

use App\Dto\Response\AbstractResponse;
use App\Entity\Provider;

class ProviderResponse extends AbstractResponse
{
    public function __construct(private Provider $provider)
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->provider->getId(),
            'name' => $this->provider->getName(),
            'url' => $this->provider->getUrl(),
        ];
    }
}
