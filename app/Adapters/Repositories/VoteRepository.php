<?php

namespace App\Adapters\Repositories;

use App\Adapters\Mappers\VoteMapper;
use App\Domain\Contracts\Repositories\VoteRepositoryInterface;
use App\Domain\Entities\Vote;
use Illuminate\Support\Facades\DB;

class VoteRepository implements VoteRepositoryInterface
{
    /**
     * @param Vote $vote
     * @return bool
     */
    public function exists(Vote $vote): bool
    {
        return DB::table('votes')
            ->where('user_id', $vote->getUserId())
            ->where('poll_option_id', $vote->getPollOptionId())
            ->exists();
    }

    /**
     * @param Vote $vote
     * @return void
     */
    public function create(Vote $vote): void
    {
        VoteMapper::fromEntity($vote)->save();
    }

    /**
     * @param string $pollOptionId
     * @return int
     */
    public function countByPollOptionId(string $pollOptionId): int
    {
        return DB::table('polls')
            ->where('poll_option_id', $pollOptionId)
            ->count();
    }
}
