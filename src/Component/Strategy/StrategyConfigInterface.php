<?php

declare(strict_types=1);

namespace App\Component\Strategy;

interface StrategyConfigInterface
{
    public function addInput(string $name, string $inputTypeName): self;

    public function getInputs(): array;

    public function addIndex(string $indexTypeName, array $config): self;

    public function getIndexes(): array;
}
