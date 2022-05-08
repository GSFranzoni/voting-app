<?php

namespace App\Factories\Entities;

use App\Domain\Contracts\Factories\BaseFactoryInterface;
use App\Domain\Entities\Poll;

class PollFactory implements BaseFactoryInterface
{
    /**
     * @param array $attributes
     * @return Poll
     */
    public static function make(array $attributes = []): Poll
    {
        $poll = new Poll();
        $poll->setId($attributes['id'] ?? '');
        $poll->setDescription($attributes['description'] ?? '');
        $poll->setFinished($attributes['finished'] ?? false);
        $poll->setFinishedAt($attributes['finishedAt'] ?? null);
        $poll->setUserId($attributes['userId'] ?? '');
        return $poll;
    }
}
