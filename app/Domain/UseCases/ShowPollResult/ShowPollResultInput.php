<?php

namespace App\Domain\UseCases\ShowPollResult;

use App\Domain\Contracts\UseCases\UseCaseInputInterface;

class ShowPollResultInput implements UseCaseInputInterface
{
    /**
     * @param string $pollId
     */
    public function __construct(protected string $pollId){}

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->pollId;
    }
}
