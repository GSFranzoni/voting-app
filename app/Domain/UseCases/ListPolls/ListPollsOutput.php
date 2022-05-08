<?php

namespace App\Domain\UseCases\ListPolls;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;
use App\Domain\Entities\Poll;

class ListPollsOutput implements UseCaseOutputInterface
{
    public function __construct(
        protected array $polls
    )
    {}

    /**
     * @return Poll[]
     */
    public function getPolls(): array
    {
        return $this->polls;
    }
}
