<?php

namespace Phparcyde\Exception;

use \Exception;
use \Throwable;

class DirectoryPathException extends Exception
{
    const MESSAGE = 'Director path does not exist';

    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        $message = empty($message) ? self::MESSAGE : $message;
        parent::__construct($message, $code, $previous);
    }
}