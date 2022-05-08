<?php

namespace App\Domain\Contracts\Entities;

interface BaseEntityInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $id
     */
    public function setId(string $id): void;
}
