<?php
namespace App\Http\VetvineTraits;
use Illuminate\Http\Request;
use App\Models\User;

trait UserDetailTrait {

    public function checkUserDetail($email , $type)
    {
        $userIp   = $_SERVER['REMOTE_ADDR'];
        $userInfo = User::where('email', $email)->where('type',$type)->first();
        if(empty($userInfo->creation_ip)) {
            $userInfo->update([
                'creation_ip' => $userIp
            ]);
        }

        $userInfo->update([
            'last_login_ip' => $userIp,
            'last_login_date' => now(),
        ]);

        return true;
    }
}
