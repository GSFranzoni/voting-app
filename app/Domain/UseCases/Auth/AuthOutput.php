<?php

namespace App\Domain\UseCases\Auth;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;

class AuthOutput implements UseCaseOutputInterface
{
    public function __construct(protected string $token)
    {}

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
