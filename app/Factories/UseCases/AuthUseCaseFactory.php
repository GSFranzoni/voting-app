<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\UserRepository;
use App\Domain\UseCases\Auth\AuthUseCase;

class AuthUseCaseFactory
{
    public static function make(): AuthUseCase
    {
        return new AuthUseCase(
            new UserRepository()
        );
    }
}
