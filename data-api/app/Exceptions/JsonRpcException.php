<?php


namespace App\Exceptions;

use Exception;

class JsonRpcException extends Exception
{
    const PARSE_ERROR = -32700;

}