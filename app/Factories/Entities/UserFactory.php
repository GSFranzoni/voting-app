<?php

namespace App\Factories\Entities;

use App\Domain\Contracts\Factories\BaseFactoryInterface;
use App\Domain\Entities\User;

class UserFactory implements BaseFactoryInterface
{
    /**
     * @param array $attributes
     * @return User
     */
    public static function make(array $attributes = []): User
    {
        $user = new User();
        $user->setId($attributes['id'] ?? '');
        $user->setName($attributes['name'] ?? '');
        $user->setEmail($attributes['email'] ?? '');
        $user->setPassword($attributes['password'] ?? '');
        return $user;
    }
}
