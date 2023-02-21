<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Provider;
use App\Exception\ProviderAlreadyExistsException;
use App\Repository\ProviderRepositoryInterface;

class ProviderService implements ProviderServiceInterface
{
    public function __construct(private ProviderRepositoryInterface $providerRepository)
    {
    }

    public function add(string $providerName, string $url): Provider
    {
        $provider = $this->providerRepository->findOneByName($providerName);

        if (null !== $provider) {
            throw new ProviderAlreadyExistsException($providerName);
        }

        return $this->providerRepository->create($providerName, $url);
    }

    public function remove(string $providerName): Provider
    {
        $provider = $this->providerRepository->getOneByName($providerName);
        $cloned = clone $provider;
        $this->providerRepository->remove($provider);

        return $cloned;
    }
}
