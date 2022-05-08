<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\PollRepository;
use App\Adapters\Repositories\UserRepository;
use App\Domain\UseCases\CreatePoll\CreatePollUseCase;

class CreatePollUseCaseFactory
{
    public static function make(): CreatePollUseCase
    {
        return new CreatePollUseCase(
            new PollRepository(),
            new UserRepository()
        );
    }
}
