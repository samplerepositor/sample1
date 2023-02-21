<?php

declare(strict_types=1);

namespace App\Component\Strategy;

interface StrategyProviderInterface
{
    public function get(string $className): StrategyInterface;
}
