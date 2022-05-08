<?php

namespace App\Domain\ValueObjects;

class Password
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
        if (password_needs_rehash($value, PASSWORD_DEFAULT)) {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }
        $this->value = $value;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function check(string $value): bool
    {
        return password_verify($value, $this->getValue());
    }
}
