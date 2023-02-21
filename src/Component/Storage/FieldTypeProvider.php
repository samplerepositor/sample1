<?php

declare(strict_types=1);

namespace App\Component\Storage;

use App\Component\AbstractProvider;
use App\Exception\InvalidFieldTypeException;

class FieldTypeProvider extends AbstractProvider implements FieldTypeProviderInterface
{
    /**
     * @var FieldTypeInterface[]
     */
    private array $fieldTypes = [];

    public function add(FieldTypeInterface $processOperation): self
    {
        $this->fieldTypes[$processOperation->getName()] = $processOperation;

        return $this;
    }

    /**
     * @throws InvalidFieldTypeException
     */
    public function get(string $name): FieldTypeInterface
    {
        if (empty($this->fieldTypes[$name])) {
            throw new InvalidFieldTypeException($name);
        }

        return $this->fieldTypes[$name];
    }
}
