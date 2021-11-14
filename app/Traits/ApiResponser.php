<?php

namespace App\Traits;

trait ApiResponser
{
    public static function successResponse($status, $data)
    {
        return response()->json(['status' => $status, 'data' => $data], $status);
    }

    public static function errorResponse($status, $error)
    {
        return response()->json(['status' => $status, 'error' => $error], $status);
    }
}
