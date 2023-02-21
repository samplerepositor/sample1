<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Provider;
use App\Exception\ProviderNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProviderRepository extends ServiceEntityRepository implements ProviderRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Provider::class);
    }

    public function create(string $name, string $url): Provider
    {
        $provider = new Provider();
        $provider->setName($name)
            ->setUrl($url);
        $this->getEntityManager()
            ->persist($provider);
        $this->getEntityManager()
            ->flush();

        return $provider;
    }

    public function getOneByName(string $name): Provider
    {
        $provider = $this->findOneByName($name);

        if (null === $provider) {
            throw new ProviderNotFoundException($name);
        }

        return $provider;
    }

    public function findOneByName(string $name): ?Provider
    {
        return $this->findOneBy([
            'name' => $name,
        ]);
    }

    public function remove(Provider $provider): void
    {
        $this->getEntityManager()
            ->remove($provider);
        $this->getEntityManager()
            ->flush();
    }
}
