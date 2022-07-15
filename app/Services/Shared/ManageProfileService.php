<?php

namespace App\Services\Shared;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Exception;
use Helpers;
use Validator;


class ManageProfileService
{

    protected $parent;

    public function __construct(Controller $parent)
    {
        $this->parent = $parent;
    }


    public function updateProfile($request)
    {
        $currentUser = User::where('type', '=', $request->user_type)->where('email', $request->email)->first();
        if (!empty($request->current_password)) {
            if (!empty($request->password && $request->confirmpassword)) {
                $request->validate([
                    'password' => 'required|min:8',
                    'confirmpassword' => 'required|same:password',
                ]);
                if (!empty($request->current_password)) {
                    if (Hash::check($request->current_password, $currentUser->password)) {
                        $newpassword = Hash::make($request->password);
                        $this->parent->successMessage("Your Password updated successfully");
                    } else {
                        $this->parent->dangerMessage("Your Current password does not match our records");
                        return redirect()->back();
                    }
                } else {
                    $this->parent->dangerMessage("Please enter your Current  password ");
                    return redirect()->back();
                }
            } else {
                $this->parent->dangerMessage("Please enter your Current And New  password ");
                return redirect()->back();
            }
        }

        try {
            $currentUser->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'network_id'    => $currentUser->networklevel,
                'timezone_id'   => $currentUser->timezone,
                'type'          => $currentUser->type,
                'password'      => (!empty($newpassword)) ? $newpassword : $currentUser->password,
            ]);
            Auth::login($currentUser);
        } catch (\Exception $e) {
            return redirect()->back();
        }
        return 'updated';
    }
}
