<?php

namespace App\Factories\Entities;

use App\Domain\Contracts\Factories\BaseFactoryInterface;
use App\Domain\Entities\PollOption;

class PollOptionFactory implements BaseFactoryInterface
{
    /**
     * @param array $attributes
     * @return PollOption
     */
    public static function make(array $attributes = []): PollOption
    {
        $pollOption = new PollOption();
        $pollOption->setId($attributes['id'] ?? '');
        $pollOption->setDescription($attributes['description'] ?? '');
        $pollOption->setPollId($attributes['pollId'] ?? '');
        return $pollOption;
    }
}
