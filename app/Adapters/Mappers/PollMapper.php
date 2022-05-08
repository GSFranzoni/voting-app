<?php

namespace App\Adapters\Mappers;

use App\Adapters\Mappers\Contracts\MapperInterface;
use App\Domain\Contracts\Entities\BaseEntity;
use App\Domain\Entities\Poll as PollEntity;
use App\Factories\Entities\PollFactory;
use App\Models\Contracts\BaseModel;
use App\Models\Poll as PollModel;

class PollMapper implements MapperInterface
{
    /**
     * @param PollModel $model
     * @return PollEntity
     */
    public static function fromModel(BaseModel $model): PollEntity
    {
        return PollFactory::make([
            'id' => $model->getAttribute('id'),
            'description' => $model->getAttribute('description'),
            'finished' => $model->getAttribute('finished'),
            'finishedAt' => $model->getAttribute('finished_at'),
            'userId' => $model->getAttribute('user_id')
        ]);
    }

    /**
     * @param PollEntity $entity
     * @return PollModel
     */
    public static function fromEntity(BaseEntity $entity): PollModel
    {
        return new PollModel([
            'id' => $entity->getId(),
            'description' => $entity->getDescription(),
            'finished' => $entity->isFinished(),
            'finished_at' => $entity->getFinishedAt(),
            'user_id' => $entity->getUserId()
        ]);
    }
}
