<?php

declare(strict_types=1);

namespace App\Component\Strategy;

use App\Component\StorageIndex\StorageIndex;

class StrategyConfig implements StrategyConfigInterface
{
    /**
     * @var StrategyInput[]
     */
    private array $inputs = [];

    /**
     * @var StorageIndex[]
     */
    private array $indexes = [];

    public function addInput(string $name, string $inputTypeName): self
    {
        $this->inputs[] = new StrategyInput($name, $inputTypeName);

        return $this;
    }

    /**
     * @return StrategyInput[]
     */
    public function getInputs(): array
    {
        return $this->inputs;
    }

    public function addIndex(string $indexTypeName, array $config): self
    {
        $this->indexes[] = new StorageIndex($indexTypeName, $config);

        return $this;
    }

    /**
     * @return StorageIndex[]
     */
    public function getIndexes(): array
    {
        return $this->indexes;
    }
}
