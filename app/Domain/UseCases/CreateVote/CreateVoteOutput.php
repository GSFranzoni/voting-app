<?php

namespace App\Domain\UseCases\CreateVote;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;

class CreateVoteOutput implements UseCaseOutputInterface
{
    public function __construct(protected string $voteId)
    {}

    /**
     * @return string
     */
    public function getVoteId(): string
    {
        return $this->voteId;
    }
}
