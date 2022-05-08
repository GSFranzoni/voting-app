<?php

namespace App\Domain\Contracts\Services;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\Token;

interface AuthServiceInterface
{
    public function token(User $user): Token;
    public function validate(User $user): bool;
}
