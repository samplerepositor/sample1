<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Provider;

interface ProviderServiceInterface
{
    public function add(string $providerName, string $url): Provider;

    public function remove(string $providerName): Provider;
}
