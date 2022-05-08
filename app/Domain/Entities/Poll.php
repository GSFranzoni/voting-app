<?php

namespace App\Domain\Entities;

use App\Domain\Contracts\Entities\BaseEntity;
use Carbon\Carbon;

class Poll extends BaseEntity
{
    public const MIN_POLL_OPTIONS = 3;

    public const MAX_POLL_OPTIONS = 5;

    /**
     * @var string
     */
    protected string $description;

    /**
     * @var string
     */
    protected string $userId;

    /**
     * @var bool
     */
    protected bool $finished;

    /**
     * @var Carbon|null
     */
    protected ?Carbon $finishedAt;

    /**
     * @var PollOption[]
     */
    protected array $options;

    public function __construct()
    {
        $this->options = [];
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return int
     */
    public function getOptionsCount(): int
    {
        return count($this->options);
    }

    /**
     * @param PollOption $option
     */
    public function addOption(PollOption $option): void
    {
        $this->options[] = $option;
    }

    /**
     * @return bool
     */
    public function isFinished(): bool
    {
        return $this->finished;
    }

    /**
     * @param bool $finished
     */
    public function setFinished(bool $finished): void
    {
        $this->finished = $finished;
    }

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
     * @return Carbon|null
     */
    public function getFinishedAt(): Carbon|null
    {
        return $this->finishedAt;
    }

    /**
     * @param Carbon|null $finishedAt
     */
    public function setFinishedAt(Carbon|null $finishedAt): void
    {
        $this->finishedAt = $finishedAt;
    }

    /**
     * @return void
     */
    public function finish(): void
    {
        $this->setFinishedAt(Carbon::now());
        $this->setFinished(true);
    }
}
