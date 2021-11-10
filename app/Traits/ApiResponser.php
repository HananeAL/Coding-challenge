<?php

namespace App\Traits;

trait ApiResponser
{
    protected function successResponse($status, $data)
    {
        return response()->json(['status' => $status, 'data' => $data], $status);
    }

    protected function errorResponse($status, $error)
    {
        return response()->json(['status' => $status, 'error' => $error], $status);
    }
}
