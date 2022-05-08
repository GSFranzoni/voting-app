<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\PollRepository;
use App\Domain\UseCases\ListPolls\ListPollsUseCase;

class ListPollsUseCaseFactory
{
    public static function make(): ListPollsUseCase
    {
        return new ListPollsUseCase(
            new PollRepository()
        );
    }
}
