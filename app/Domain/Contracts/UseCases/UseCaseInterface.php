<?php

namespace App\Domain\Contracts\UseCases;

interface UseCaseInterface
{
    public function execute(UseCaseInputInterface $input): UseCaseOutputInterface;
}
