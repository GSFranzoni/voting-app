<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\PollRepository;
use App\Domain\UseCases\FinishPoll\FinishPollUseCase;

class FinishPollUseCaseFactory
{
    public static function make(): FinishPollUseCase
    {
        return new FinishPollUseCase(
            new PollRepository()
        );
    }
}
