<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class UsersRegistrationController extends Controller
{

    public function verifyEmailPopup(){
        if(isset(auth()->user()->email_verified_at) == false){
            $verifyEmail = true;
            return view('frontend.home', compact('verifyEmail'));
        }else{
            return redirect()->route('home');
        }
    }

    public function userRegisterationForm()
    {
        return view('frontend.auth.register');
    }
    public function authenticated(Request $request, $user)
     {
    $user->generateTwoFactorCode();
    $user->notify(new TwoFactorCode());
    }

    public function userLogin(Request $request)
    {
        $user=User::where('email', $request->email)->first();
        if(!empty($user) && $user !== null){
            $findUser=User::where('email', $request->email)->where('password', Hash::check($request->password, $user->password))->first();
           if($findUser->status !=1){
              return redirect()->back()->with('loginerrors', 'Your account is not approved by admin. Please try again later');
           }
        } else {

        }
    }
}
