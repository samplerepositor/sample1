<?php

declare(strict_types=1);

namespace App\Component\Strategy;

use App\Component\AbstractProvider;
use App\Exception\StrategyNotFoundException;
use ReflectionClass;

class StrategyProvider extends AbstractProvider implements StrategyProviderInterface
{
    /**
     * @var StrategyInterface[]
     */
    private array $strategies = [];

    public function add(StrategyInterface $processOperation): self
    {
        $reflection = new ReflectionClass($processOperation);
        $this->strategies[$reflection->getShortName()] = $processOperation;

        return $this;
    }

    /**
     * @throws StrategyNotFoundException
     */
    public function get(string $className): StrategyInterface
    {
        $className = $this->getShortClassName($className);

        if (empty($this->strategies[$className])) {
            throw new StrategyNotFoundException($className);
        }

        return $this->strategies[$className];
    }
}
