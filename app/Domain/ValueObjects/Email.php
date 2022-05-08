<?php

namespace App\Domain\ValueObjects;

use App\Exceptions\InvalidEmailException;

class Email
{
    /**
     * @var string
     */
    private string $value;

    public function __construct(string $value)
    {
        $this->setValue($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }
        $this->value = $value;
    }
}
