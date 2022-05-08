<?php

namespace App\Domain\UseCases\FinishPoll;

use App\Domain\Contracts\UseCases\UseCaseInputInterface;

class FinishPollInput implements UseCaseInputInterface
{
    public function __construct(
        protected string $pollId,
        protected string $userId
    )
    {}

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->pollId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }
}
