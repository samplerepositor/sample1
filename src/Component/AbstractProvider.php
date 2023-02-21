<?php

declare(strict_types=1);

namespace App\Component;

class AbstractProvider
{
    protected function getShortClassName(string $className): string
    {
        if (!str_contains($className, '\\')) {
            return $className;
        }

        $classNameArray = explode('\\', $className);

        return array_pop($classNameArray);
    }
}
