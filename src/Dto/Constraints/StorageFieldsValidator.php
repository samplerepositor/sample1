<?php

declare(strict_types=1);

namespace App\Dto\Constraints;

use JetBrains\PhpStorm\ExpectedValues;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class StorageFieldsValidator extends ConstraintValidator
{
    public function validate(mixed $value, #[ExpectedValues(StorageFields::class)] Constraint $constraint): void
    {
        if (!$constraint instanceof StorageFields) {
            throw new UnexpectedTypeException($constraint, StorageFields::class);
        }

        $this->checkStructure($value, $constraint);
        $this->checkValues($value, $constraint);
    }

    private function checkStructure(mixed $value, StorageFields $constraint): void
    {
        if (!is_array($value)) {
            throw new UnexpectedValueException($value, 'array');
        }

        $allowedKeys = $constraint->allowedKeys;
        sort($allowedKeys);

        foreach ($value as $i => $items) {
            if (!is_array($items)) {
                throw new UnexpectedValueException($items, 'array');
            }

            $itemsKeys = array_keys($items);
            sort($itemsKeys);

            if ($itemsKeys === $allowedKeys) {
                continue;
            }

            $this->context->buildViolation($constraint->invalidFieldsStruct)
                ->atPath('['.$i.']')
                ->addViolation()
            ;
        }
    }

    private function checkValues(array $value, StorageFields $constraint): void
    {
        $hasIdentity = false;

        foreach ($value as $items) {
            if (!isset($items['identity'])) {
                continue;
            }

            if (is_bool($items['identity']) && $items['identity']) {
                $hasIdentity = true;
                break;
            }
        }

        if (!$hasIdentity) {
            $this->context->buildViolation($constraint->identityMissing)
                ->addViolation()
            ;
        }
    }
}
