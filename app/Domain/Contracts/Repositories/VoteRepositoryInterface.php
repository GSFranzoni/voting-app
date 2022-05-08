<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\Vote;

interface VoteRepositoryInterface
{
    public function exists(Vote $vote): bool;
    public function create(Vote $vote): void;
    public function countByPollOptionId(string $pollOptionId): int;
}
