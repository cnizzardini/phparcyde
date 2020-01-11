<?php

namespace Phparcyde\Exception;

use \Exception;
use \Throwable;

class UrlException extends Exception
{
    const MESSAGE = 'Url format is invalid';

    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        $message = empty($message) ? self::MESSAGE : $message;
        parent::__construct($message, $code, $previous);
    }
}