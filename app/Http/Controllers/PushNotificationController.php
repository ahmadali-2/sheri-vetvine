<?php

namespace App\Http\Controllers;

use App\Models\PushNotification;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    public function mark_as_read(Request $request)
    {
        $id = $request->id;
        PushNotification::where('id', $id)->where('is_read', '0')->update([
            'is_read' => '1'
        ]);

        return [
            'success'  => true,
            'id'       => $id
        ];
    }
}
