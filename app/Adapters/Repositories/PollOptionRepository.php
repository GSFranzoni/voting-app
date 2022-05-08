<?php

namespace App\Adapters\Repositories;

use App\Adapters\Mappers\PollOptionMapper;
use App\Domain\Contracts\Repositories\PollOptionRepositoryInterface;
use App\Domain\Entities\PollOption;
use App\Models\PollOption as PollOptionModel;

class PollOptionRepository implements PollOptionRepositoryInterface
{
    /**
     * @param string $pollOptionId
     * @return PollOption|null
     */
    public function getById(string $pollOptionId): PollOption|null
    {
        $pollOption = PollOptionModel::find($pollOptionId);
        if (is_null($pollOption)) {
            return null;
        }
        return PollOptionMapper::fromModel($pollOption);
    }
}
