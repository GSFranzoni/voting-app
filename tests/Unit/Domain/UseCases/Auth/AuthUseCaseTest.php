<?php

namespace Domain\UseCases\Auth;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Domain\UseCases\Auth\AuthUseCase;
use App\Domain\UseCases\Auth\AuthInput;
use App\Exceptions\UnauthorizedException;
use App\Factories\Entities\UserFactory;
use PHPUnit\Framework\TestCase;

class AuthUseCaseTest extends TestCase
{
    public function testEmailNotFound()
    {
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('getByEmail')->willReturn(null);
        $useCase = new AuthUseCase($userRepositoryMock);
        $useCaseInput = new AuthInput('test@email.com', 'password');
        $this->expectException(UnauthorizedException::class);
        $useCase->execute($useCaseInput);
    }

    public function testWrongPassword()
    {
        $userMock = UserFactory::make([
            'email' => 'test@email.com',
            'password' => 'password'
        ]);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('getByEmail')->willReturn($userMock);
        $useCase = new AuthUseCase($userRepositoryMock);
        $useCaseInput = new AuthInput('email', 'wrong password');
        $this->expectException(UnauthorizedException::class);
        $useCase->execute($useCaseInput);
    }

    public function testUserAuthSuccessfully()
    {
        $userMock = UserFactory::make([
            'email' => 'test@email.com',
            'password' => 'password'
        ]);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('getByEmail')->willReturn($userMock);
        $useCase = new AuthUseCase($userRepositoryMock);
        $useCaseInput = new AuthInput('email', 'password');
        $output = $useCase->execute($useCaseInput);
        $this->assertIsString($output->getToken());
    }
}
