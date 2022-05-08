<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\PollOption;

interface PollOptionRepositoryInterface
{
    public function getById(string $pollOptionId): PollOption|null;
}
