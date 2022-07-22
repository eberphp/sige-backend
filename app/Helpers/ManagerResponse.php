<?php

namespace App\Helpers;

trait ManagerResponse
{
    # Traer información
    public function info($info = null)
    {
        return [
            'success' => true,
            'info' => $info
        ];
    }
    # proceso correcto
    public function success($message = "", $info = null)
    {
        return [
            'success' => true,
            'info' => $info,
            'message' => $message
        ];
    }

    # proceso incorrecto
    public function warning($message)
    {
        return [
            'success' => false,
            'message' => $message
        ];
    }

    # error de proceso : excepción
    public function error($message, $code = 500)
    {
        return [
            'success' => false,
            'message' => $message,
            "code"    => $code
        ];
    }
}
