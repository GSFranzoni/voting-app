<?php

namespace App\Domain\Contracts\Factories;

use App\Domain\Contracts\Entities\BaseEntityInterface;

interface BaseFactoryInterface
{
    public static function make(array $attributes): BaseEntityInterface;
}
