<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function getByEmail(string $email): ?User;
    public function createToken(User $user): string;
    public function create(User $user): void;
    public function exists(string $userId): bool;
    public function userHasUnfinishedPoll(string $userId): bool;
    public function update(User $user): void;
}
