<?php

namespace App\Adapters\Mappers;

use App\Adapters\Mappers\Contracts\MapperInterface;
use App\Domain\Contracts\Entities\BaseEntity;
use App\Domain\Entities\PollOption as PollOptionEntity;
use App\Factories\Entities\PollOptionFactory;
use App\Models\Contracts\BaseModel;
use App\Models\PollOption as PollOptionModel;

class PollOptionMapper implements MapperInterface
{
    /**
     * @param PollOptionModel $model
     * @return PollOptionEntity
     */
    public static function fromModel(BaseModel $model): PollOptionEntity
    {
        return PollOptionFactory::make([
            'id' => $model->getAttribute('id'),
            'description' => $model->getAttribute('description'),
            'pollId' => $model->getAttribute('poll_id')
        ]);
    }

    /**
     * @param PollOptionEntity $entity
     * @return PollOptionModel
     */
    public static function fromEntity(BaseEntity $entity): PollOptionModel
    {
        return new PollOptionModel([
            'id' => $entity->getId(),
            'description' => $entity->getDescription(),
            'poll_id' => $entity->getPollId()
        ]);
    }
}
