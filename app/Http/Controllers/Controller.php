<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successMessage($msg)
    {
        return toastr()->success( $msg);
    }

    public function dangerMessage($msg)
    {
        return toastr()->error($msg);
    }

    public function warningMessage($msg)
    {
        return toastr()->warning($msg .'⚡️');
        // return notify()->preset('warning-message', ['title' => 'Error', 'message'=> $msg]);
    }
}
