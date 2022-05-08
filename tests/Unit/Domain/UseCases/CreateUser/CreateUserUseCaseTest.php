<?php

namespace Domain\UseCases\CreateUser;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\UseCases\CreateUser\CreateUserInput;
use App\Domain\UseCases\CreateUser\CreateUserOutput;
use App\Domain\UseCases\CreateUser\CreateUserUseCase;
use App\Exceptions\UserAlreadyRegisteredException;
use App\Factories\Entities\UserFactory;
use PHPUnit\Framework\TestCase;

class CreateUserUseCaseTest extends TestCase
{
    public function testEmailAlreadyRegistered()
    {
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('getByEmail')->willReturn(UserFactory::make([
            'name' => 'Gui',
            'email' => 'gui@email.com',
            'password' => 'password'
        ]));
        $useCase = new CreateUserUseCase($userRepositoryMock);
        $this->expectException(UserAlreadyRegisteredException::class);
        $useCase->execute(new CreateUserInput('Gui', 'gui@email.com', 'password'));
    }

    public function testCreateUserSuccessfully()
    {
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('getByEmail')->willReturn(null);
        $useCase = new CreateUserUseCase($userRepositoryMock);
        $output = $useCase->execute(new CreateUserInput('Gui', 'gui@email.com', 'password'));
        $this->assertNotNull($output);
        $this->assertIsString($output->getUser()->getId());
        $this->assertNotEmpty($output->getUser()->getId());
    }
}
