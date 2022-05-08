<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\Poll;
use App\Domain\Entities\PollOption;

interface PollRepositoryInterface
{
    /**
     * @param Poll $poll
     * @return void
     */
    public function create(Poll $poll): void;
    /**
     * @param Poll $poll
     * @return void
     */
    public function update(Poll $poll): void;
    /**
     * @param string $pollId
     * @return Poll|null
     */
    public function getById(string $pollId): Poll|null;

    /**
     * @return Poll[]
     */
    public function getAll(): array;
    /**
     * @param string $pollId
     * @return PollOption[]
     */
    public function getPollOptions(string $pollId): array;
}
