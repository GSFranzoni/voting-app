<?php

namespace App\Exceptions;

use Throwable;

class UserAlreadyRegisteredException extends ValidationException
{
    const DEFAULT_MESSAGE = 'User already registered';

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
