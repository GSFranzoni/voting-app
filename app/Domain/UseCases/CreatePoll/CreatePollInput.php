<?php

namespace App\Domain\UseCases\CreatePoll;

use App\Domain\Contracts\UseCases\UseCaseInputInterface;

class CreatePollInput implements UseCaseInputInterface
{
    public function __construct(
        protected string $description,
        protected string $userId,
        protected array $options
    )
    {}

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'description' => $this->getDescription(),
            'options' => $this->getOptions(),
            'userId' => $this->getUserId()
        ];
    }
}
