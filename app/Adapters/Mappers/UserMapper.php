<?php

namespace App\Adapters\Mappers;

use App\Adapters\Mappers\Contracts\MapperInterface;
use App\Domain\Contracts\Entities\BaseEntity;
use App\Domain\Entities\User as UserEntity;
use App\Factories\Entities\UserFactory;
use App\Models\Contracts\BaseModel;
use App\Models\User as UserModel;

class UserMapper implements MapperInterface
{
    /**
     * @param UserModel $model
     * @return UserEntity
     */
    public static function fromModel(BaseModel $model): UserEntity
    {
        return UserFactory::make([
            'id' => $model->getAttribute('id'),
            'name' => $model->getAttribute('name'),
            'email' => $model->getAttribute('email'),
            'password' => $model->getAttribute('password')
        ]);
    }

    /**
     * @param UserEntity $entity
     * @return UserModel
     */
    public static function fromEntity(BaseEntity $entity): UserModel
    {
        return new UserModel([
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'email' => $entity->getEmail()->getValue(),
            'password' => $entity->getPassword()->getValue()
        ]);
    }
}
