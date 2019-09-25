<?php

namespace App\Exceptions\Users;

use Exception;

class ValueTooLongException extends Exception
{
    public $info;

    public function __construct($info,$message, $code, Exception $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
        $this->info = $info;
    }
}
