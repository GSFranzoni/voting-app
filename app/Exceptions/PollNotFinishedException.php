<?php

namespace App\Exceptions;

use Throwable;

class PollNotFinishedException extends ValidationException
{
    const DEFAULT_MESSAGE = 'Poll was not finished';

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
