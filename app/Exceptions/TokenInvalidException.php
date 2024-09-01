<?php
namespace App\Exceptions;

use Exception;

class TokenInvalidException extends Exception
{
    public function render($request)
    {
                dd("ss");
        return redirect()->route('custom.token.invalid');
    }
}
