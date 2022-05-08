<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\PollRepository;
use App\Adapters\Repositories\VoteRepository;
use App\Domain\UseCases\ShowPollResult\ShowPollResultUseCase;

class ShowPollResultUseCaseFactory
{
    public static function make(): ShowPollResultUseCase
    {
        return new ShowPollResultUseCase(
            new PollRepository(),
            new VoteRepository()
        );
    }
}
