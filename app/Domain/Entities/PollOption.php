<?php

namespace App\Domain\Entities;

use App\Domain\Contracts\Entities\BaseEntity;
use App\Exceptions\ValidationException;

class PollOption extends BaseEntity
{
    /**
     * @var string
     */
    protected string $description;

    /**
     * @var string
     */
    protected string $pollId;

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        if (empty($description)) {
            throw new ValidationException();
        }
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->pollId;
    }

    /**
     * @param string $pollId
     */
    public function setPollId(string $pollId): void
    {
        $this->pollId = $pollId;
    }
}
