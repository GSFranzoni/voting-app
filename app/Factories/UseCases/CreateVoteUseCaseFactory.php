<?php

namespace App\Factories\UseCases;

use App\Adapters\Repositories\PollOptionRepository;
use App\Adapters\Repositories\PollRepository;
use App\Adapters\Repositories\UserRepository;
use App\Adapters\Repositories\VoteRepository;
use App\Domain\UseCases\CreateVote\CreateVoteUseCase;

class CreateVoteUseCaseFactory
{
    public static function make(): CreateVoteUseCase
    {
        return new CreateVoteUseCase(
            new VoteRepository(),
            new PollRepository(),
            new PollOptionRepository(),
            new UserRepository()
        );
    }
}
