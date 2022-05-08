<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\UserRepository;
use App\Domain\UseCases\CreateUser\CreateUserUseCase;

class CreateUserUseCaseFactory
{
    public static function make(): CreateUserUseCase
    {
        return new CreateUserUseCase(
            new UserRepository()
        );
    }
}
