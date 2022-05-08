<?php

namespace App\Domain\UseCases\CreateUser;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;
use App\Exceptions\UserAlreadyRegisteredException;
use App\Factories\Entities\UserFactory;

class CreateUserUseCase implements UseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param CreateUserInput $input
     * @return CreateUserOutput
     */
    public function execute(UseCaseInputInterface $input): CreateUserOutput
    {
        $user = UserFactory::make($input->array());
        if (!empty($this->repository->getByEmail($user->getEmail()->getValue()))) {
            throw new UserAlreadyRegisteredException();
        }
        $this->repository->create($user);
        return new CreateUserOutput($user);
    }
}
