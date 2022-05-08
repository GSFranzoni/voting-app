<?php

namespace App\Domain\UseCases\CreatePoll;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;
use App\Domain\Entities\Poll;

class CreatePollOutput implements UseCaseOutputInterface
{
    public function __construct(protected Poll $poll) {}

    /**
     * @return Poll
     */
    public function getPoll(): Poll
    {
        return $this->poll;
    }
}
