<?php

namespace Phparcyde\Exception;

use \Exception;
use \Throwable;

class BranchException extends Exception
{
    const MESSAGE = 'Branch not found';

    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        $message = empty($message) ? self::MESSAGE : $message;
        parent::__construct($message, $code, $previous);
    }
}