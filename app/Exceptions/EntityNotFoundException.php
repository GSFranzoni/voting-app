<?php

namespace App\Exceptions;

use DomainException;
use Throwable;

class EntityNotFoundException extends DomainException
{
    const DEFAULT_MESSAGE = 'Entity not found';

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
