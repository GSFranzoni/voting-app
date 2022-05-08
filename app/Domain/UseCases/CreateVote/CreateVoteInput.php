<?php

namespace App\Domain\UseCases\CreateVote;

use App\Domain\Contracts\UseCases\UseCaseInputInterface;

class CreateVoteInput implements UseCaseInputInterface
{
    public function __construct(
        protected string $userId,
        protected string $pollOptionId
    )
    {}

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getPollOptionId(): string
    {
        return $this->pollOptionId;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'userId' => $this->getUserId(),
            'pollOptionId' => $this->getPollOptionId()
        ];
    }
}
