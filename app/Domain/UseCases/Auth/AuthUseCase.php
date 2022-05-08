<?php

namespace App\Domain\UseCases\Auth;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;
use App\Exceptions\UnauthorizedException;

class AuthUseCase implements UseCaseInterface
{
    public function __construct(
        private UserRepositoryInterface $repository
    ) {}

    /**
     * @param AuthInput $input
     * @return AuthOutput
     */
    public function execute(UseCaseInputInterface $input): AuthOutput
    {
        $user = $this->repository->getByEmail($input->getEmail());
        if (empty($user)) {
            throw new UnauthorizedException('Invalid credentials.');
        }
        if (!$user->getPassword()->check($input->getPassword())) {
            throw new UnauthorizedException('Invalid credentials.');
        }
        return new AuthOutput($this->repository->createToken($user));
    }
}
