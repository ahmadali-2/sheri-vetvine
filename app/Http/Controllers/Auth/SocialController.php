<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use League\OAuth1\Client\Server\Twitter;
use Session;
use App\Http\VetvineTraits\UserDetailTrait;

class SocialController extends Controller
{
    use UserDetailTrait;

    protected $setUserAndNetwork;
    protected $setCommaSepratedValues;

    public function redirect($provider, $usertype, $network)
    {
        $this->setUserAndNetwork = ['usertype' => $usertype, 'networktype' => $network];
        $this->setCommaSepratedValues = implode(",", $this->setUserAndNetwork);
        session(['comma_separated' => $this->setCommaSepratedValues]);

       return  $this->redirectToProvider($provider);
    }

    private function redirectToProvider($provider)
    {
        try{
            if($provider == 'twitter') {
                return Socialite::driver($provider)->redirect();
            } else {
                return Socialite::driver($provider)->with(['state' =>  $this->setUserAndNetwork])->redirect();
            }
        } catch(Exception $e) {
            return $this->sendErrorMessage($e->getMessage());
        }
    }

    private function authenticateWithTwitter()
    {
        try {
            $TWITTER_ACCESS_TOKEN = '2778673796-o5lGaXkGkrxLFT7cLuuWfX9aCQ8DLhjqXDcJO49';
            $TWITTER_ACCESS_TOKEN_SECRET = 'S4lSLym8xULxyiSMbdX7TlXpfs8bGGKTUXUOuWwhyrIg3';
            return  Socialite::driver('twitter')->userFromTokenAndSecret($TWITTER_ACCESS_TOKEN, $TWITTER_ACCESS_TOKEN_SECRET);
        } catch(Exception $e) {
            return $this->sendErrorMessage($e->getMessage());
        }
    }


    private function sendErrorMessage($msg=null)
    {
         parent::dangerMessage("Something Went Wrong, Please Try Again");
         return redirect('/');
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {

            $userAndNetworkType = explode(",", session('comma_separated'));
            $user_type = $userAndNetworkType[0];
            $network_type = $userAndNetworkType[1];

            if ($provider == 'twitter') {
               $user = $this->authenticateWithTwitter();
            } else {
                $user = Socialite::driver($provider)->stateless()->user();
            }

            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {
                Auth::login($finduser);
                $this->checkuserdetail($finduser->email, $finduser->type);
                return redirect()->route('checkusertype');
            } elseif($user_type == 0 || $network_type == 0){
                parent::dangerMessage("You Are Not Registered In The System");
                parent::dangerMessage("Please Select Network Level And User Profession");
                return redirect('/');
            }
             else {
                $dataPassword = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                $newpassword = substr(str_shuffle($dataPassword), 0);
                $newuser = User::create([
                    'name'           => $user->getName(),
                    'email'          => $user->getEmail(),
                    'image_full_path'=> $user->getAvatar(),
                    'provider_id'    => $user->getId(),
                    'provider'       => $provider,
                    'type'           =>  2,
                    'network_id'     => $network_type,
                    'password'       => Hash::make($newpassword),
                ]);
                $newuser->markEmailAsVerified();
                $this->checkuserdetail($newuser->email, $newuser->type);
                Auth::login($newuser);
                return redirect()->route('checkusertype');
            }
        } catch (Exception $e) {
            return $this->sendErrorMessage($e->getMessage());
        }
    }
}
