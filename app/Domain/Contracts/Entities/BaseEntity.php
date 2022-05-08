<?php

namespace App\Domain\Contracts\Entities;

use Illuminate\Support\Str;
use JsonSerializable;

class BaseEntity implements BaseEntityInterface, JsonSerializable
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        if (empty($id)) {
            $id = $this->generateId();
        }
        $this->id = $id;
    }

    /**
     * @return string
     */
    private function generateId(): string
    {
        return Str::uuid()->toString();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
