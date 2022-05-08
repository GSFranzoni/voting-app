<?php

namespace App\Domain\UseCases\FinishPoll;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;
use Carbon\Carbon;

class FinishPollOutput implements UseCaseOutputInterface
{
    public function __construct(
        protected Carbon $finishedAt
    )
    {}

    /**
     * @return Carbon
     */
    public function getFinishedAt(): Carbon
    {
        return $this->finishedAt;
    }
}
