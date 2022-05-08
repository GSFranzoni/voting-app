<?php

namespace App\Adapters\Mappers\Contracts;

use App\Domain\Contracts\Entities\BaseEntity;
use App\Models\Contracts\BaseModel;

interface MapperInterface
{
    /**
     * @param BaseModel $model
     * @return BaseEntity
     */
    public static function fromModel(BaseModel $model): BaseEntity;

    /**
     * @param BaseEntity $entity
     * @return BaseModel
     */
    public static function fromEntity(BaseEntity $entity): BaseModel;
}
