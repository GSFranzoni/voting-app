<?php

namespace App\Factories\Entities;

use App\Domain\Contracts\Factories\BaseFactoryInterface;
use App\Domain\Entities\Vote;

class VoteFactory implements BaseFactoryInterface
{
    /**
     * @param array $attributes
     * @return Vote
     */
    public static function make(array $attributes = []): Vote
    {
        $vote = new Vote();
        $vote->setId($attributes['id'] ?? '');
        $vote->setUserId($attributes['userId'] ?? '');
        $vote->setPollOptionId($attributes['pollOptionId'] ?? '');
        return $vote;
    }
}
