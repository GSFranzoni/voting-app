<?php

namespace App\Domain\Entities;

use App\Domain\Contracts\Entities\BaseEntity;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\Password;

class User extends BaseEntity
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var Email
     */
    protected Email $email;

    /**
     * @var Password
     */
    protected Password $password;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = new Email($email);
    }

    /**
     * @return Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = new Password($password);
    }
}
