<?php

namespace App\Adapters\Repositories;

use App\Adapters\Mappers\UserMapper;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param string $userId
     * @return bool
     */
    public function exists(string $userId): bool
    {
        return DB::table('users')
            ->where('id', $userId)
            ->exists();
    }

    /**
     * @param string $userId
     * @return bool
     */
    public function userHasUnfinishedPoll(string $userId): bool
    {
        return DB::table('polls')
            ->where('user_id', $userId)
            ->where('finished', 0)
            ->exists();
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function getByEmail(string $email): ?User
    {
        /** @var UserModel $user */
        $user = UserModel::where('email', $email)->first();
        if (empty($user)) {
            return null;
        }
        return UserMapper::fromModel($user);
    }

    /**
     * @param User $user
     * @return void
     */
    public function create(User $user): void
    {
        UserMapper::fromEntity($user)->save();
    }

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user): void
    {
        UserMapper::fromEntity($user)->update();
    }

    /**
     * @param User $user
     * @return string
     */
    public function createToken(User $user): string
    {
        return UserMapper::fromEntity($user)->createToken('auth')->plainTextToken;
    }
}
