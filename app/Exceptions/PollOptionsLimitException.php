<?php

namespace App\Exceptions;

use App\Domain\Entities\Poll;
use Throwable;

class PollOptionsLimitException extends ValidationException
{
    const DEFAULT_MESSAGE = 'Number of Poll options must be between '. Poll::MIN_POLL_OPTIONS. ' and '. Poll::MAX_POLL_OPTIONS;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = self::DEFAULT_MESSAGE, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
