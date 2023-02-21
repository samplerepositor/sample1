<?php

declare(strict_types=1);

namespace App\Component\Strategy;

use App\Entity\StorageRecord;
use App\Entity\StrategySchema;

interface StrategyInterface
{
    public function configure(StrategyConfigInterface $strategyConfig): void;

    public function execute(
        array          $config,
        array          $filter,
        StrategySchema $strategySchema,
        StorageRecord  $storageRecord
    ): ?StorageRecord;
}
