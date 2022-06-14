<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function render($request, Exception $exception)
    {
        if ($request->is('api/*')) {
            //dd($request->is('api/*'));
            if ($exception instanceof Exception && $request->wantsJson()) {
                # code...
                return response()->json(["error" => true, "message" => $this->getMessage()]);
            }

        }
    }
}
