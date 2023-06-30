<?php

namespace App\Services;

class ResponseService
{

    private static function requestMethod()
    {
        switch (request()->method()) {
            case 'PUT':
                return 'edit';
                break;

            case 'DELETE':
                return 'hapus';
                break;

            default:
                return 'tambah';
                break;
        }
    }

    public static function success($route, $param = null)
    {
        return redirect()->route($route, $param)->with([
            'status'    => true,
            'message'   => 'Data berhasil di'.static::requestMethod().'.'
        ]);
    }

    public static function error($route, $param = null)
    {
        return redirect()->route($route, $param)->with([
            'status'    => false,
            'message'   => 'Data gagal di'.static::requestMethod().'.'
        ]);
    }

    public static function successWithMessage($message, $route, $param = null) {
        return redirect()->route($route, $param)->with([
            'status'    => true,
            'message'   => $message
        ]);
    }

    public static function errorWithMessage($message, $route, $param = null) {
        return redirect()->route($route, $param)->with([
            'status'    => false,
            'message'   => $message
        ]);
    }

}

