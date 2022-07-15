<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LicensureController extends Controller
{
    public function licensure(Request $request)
    {
        $network_id = $request->networkId;
        User::where('id', Auth::id())->update([
            'network_id' => $network_id,
        ]);

        $user = User::where('id', Auth::id())->where('network_id', $network_id)->first();
        return $user;
    }
}
