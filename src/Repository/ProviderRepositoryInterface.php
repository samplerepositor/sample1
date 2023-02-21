<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Provider;
use Doctrine\Persistence\ManagerRegistry;

interface ProviderRepositoryInterface
{
    public function __construct(ManagerRegistry $registry);

    public function create(string $name, string $url): Provider;

    public function getOneByName(string $name): Provider;

    public function findOneByName(string $name): ?Provider;

    public function remove(Provider $provider): void;
}
