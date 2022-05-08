<?php

namespace App\Domain\UseCases\Auth;

use App\Domain\Contracts\UseCases\UseCaseInputInterface;

class AuthInput implements UseCaseInputInterface
{
    public function __construct(
        protected string $email,
        protected string $password
    )
    {}

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
