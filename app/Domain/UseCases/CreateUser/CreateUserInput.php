<?php

namespace App\Domain\UseCases\CreateUser;

use App\Domain\Contracts\UseCases\UseCaseInputInterface;

class CreateUserInput implements UseCaseInputInterface
{
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $password
    ){}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ];
    }
}
