<?php

namespace App\Domain\UseCases\CreateUser;

use App\Domain\Contracts\UseCases\UseCaseOutputInterface;
use App\Domain\Entities\User;

class CreateUserOutput implements UseCaseOutputInterface
{
    public function __construct(
        private User $user
    ){}

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
