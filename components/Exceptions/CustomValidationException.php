<?php

namespace components\Exceptions;

class CustomValidationException extends \Exception
{
    public const TYPE_SUCCESS = 1;
    public const TYPE_WARNING = 2;
    public const TYPE_ERROR = 3;
    public const TYPE_INFO = 4;


}
