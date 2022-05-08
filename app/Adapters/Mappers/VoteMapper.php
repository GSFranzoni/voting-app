<?php

namespace App\Adapters\Mappers;

use App\Adapters\Mappers\Contracts\MapperInterface;
use App\Domain\Contracts\Entities\BaseEntity;
use App\Domain\Entities\Vote as VoteEntity;
use App\Factories\Entities\VoteFactory;
use App\Models\Contracts\BaseModel;
use App\Models\Vote as VoteModel;

class VoteMapper implements MapperInterface
{
    /**
     * @param VoteModel $model
     * @return VoteEntity
     */
    public static function fromModel(BaseModel $model): VoteEntity
    {
        return VoteFactory::make([
            'id' => $model->getAttribute('id'),
            'userId' => $model->getAttribute('user_id'),
            'pollOptionId' => $model->getAttribute('poll_option_id')
        ]);
    }

    /**
     * @param VoteEntity $entity
     * @return VoteModel
     */
    public static function fromEntity(BaseEntity $entity): VoteModel
    {
        return new VoteModel([
            'id' => $entity->getId(),
            'user_id' => $entity->getUserId(),
            'poll_option_id' => $entity->getPollOptionId()
        ]);
    }
}
