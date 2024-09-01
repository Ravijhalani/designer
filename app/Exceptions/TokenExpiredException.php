<?php 


namespace App\Exceptions;

use Exception;

class TokenExpiredException extends Exception
{
    public function render($request)
    {
        dd("ss");
        return redirect()->route('custom.token.expired');
    }
}


