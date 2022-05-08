<?php

namespace App\Domain\Entities;

use App\Domain\Contracts\Entities\BaseEntity;

class Vote extends BaseEntity
{
    /**
     * @var string
     */
    protected string $userId;

    /**
     * @var string
     */
    protected string $pollOptionId;

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getPollOptionId(): string
    {
        return $this->pollOptionId;
    }

    /**
     * @param string $pollOptionId
     */
    public function setPollOptionId(string $pollOptionId): void
    {
        $this->pollOptionId = $pollOptionId;
    }
}
