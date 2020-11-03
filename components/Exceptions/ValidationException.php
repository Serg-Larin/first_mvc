<?php

namespace components\Exceptions;

class ValidationException extends \Exception
{
    public const TYPE_WARNING = 2;
    public const TYPE_ERROR = 3;


}
