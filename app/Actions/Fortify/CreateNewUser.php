<?php

namespace App\Actions\Fortify;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\VetvineTraits\UserDetailTrait;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, UserDetailTrait;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

            Validator::make($input, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ])->validate();

            $user = new User();
            $user->name = $input['first_name'] . ' ' . $input['last_name'];
            $user->email = $input['email'];
            $user->password = Hash::make($input['password']);
            $user->network_id = $input['networklevel'];
            $user->timezone_id = $input['timezone'];
            $user->type = $input['memberlevel'];
            $user->status = 1;
            $user->save();
            $this->checkUserDetail($user->email, $user->type);
            Auth::login($user);


            $email = $input['email'];
            $domain = ltrim(stristr($email, '@'), '@');
            if(checkdnsrr($domain,'ANY') && $domain != 'mailinator.com'){

                event(new UserRegistered($user));
                try {
                } catch (\Throwable $th) {
                    return $user;
                }
                return $user;
            }else{
                $user->delete();
                session()->put('emailError', 'Email not valid!');
                return $user;
            }

    }
}
