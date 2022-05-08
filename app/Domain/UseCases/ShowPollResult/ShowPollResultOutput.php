<?php

namespace App\Domain\UseCases\ShowPollResult;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;

class ShowPollResultOutput implements UseCaseOutputInterface
{
    /**
     * @var array
     */
    private array $rollOptions;

    public function setRollOption(string $description, int $votes)
    {
        $this->rollOptions[] = [
            'description' => $description,
            'votes' => $votes
        ];
    }

    /**
     * @return array
     */
    public function getRollOptions(): array
    {
        return $this->rollOptions;
    }
}
