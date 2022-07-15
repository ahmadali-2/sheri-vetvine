<?php

namespace App\Http\Controllers\Admins\Guest;

use App\Http\Controllers\Controller;
use App\Models\Admins\Webinar\BuyEventPlan;
use App\Models\UserMemberAndNetworkLevel;
use Exception;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function guestRegistrationFee(){
        $userNetworkLevels = UserMemberAndNetworkLevel::where('parent_id', '!=', null)->paginate(10);
        return view('admins.guest.guest_registration_fee',compact('userNetworkLevels'));
    }

    public function updateRegistrationFee(Request $request){
        $data = array();
        $data['registration_fee'] = $request->registration_fee;
        try{
            UserMemberAndNetworkLevel::find($request->network_level_id)->update($data);
            return response()->json([
                'code' => 200,
                'message' => 'Registration Fee Successfully Updated!',
            ]);
        }catch(Exception $ex){
            return response()->json([
                'code' => 400,
                'message' => 'Action faild, user might not exist!',
            ]);
        }
    }

    public function nextGuestScreen(Request $request){
        if(isset($request->guest_screen)){
            if($request->guest_screen == 1){
                return response()->json([
                    'html' => view('frontend.auth.register_login')->render(),
                ]);
            }
            if($request->guest_screen == 2){
                return response()->json([
                    'html' => view('frontend.auth.login_course_registration_detail')->render(),
                ]);
            }
            elseif($request->guest_screen == 3){
                $event_price = $request->event_price;
                $event_id = $request->event_id;
                $user_id = $request->user_id;
                $event_title = $request->event_title;
                if($event_price == 'Free'){
                    BuyEventPlan::create([
                        'user_id' => $request->user_id,
                        'event_id' => $request->event_id,
                        'amount' => 0,
                        'transaction_id' => 'free',
                    ]);
                    return response()->json([
                        'refresh' => true,
                    ]);
                }
                return response()->json([
                    'html' => view('frontend.auth.login_course_registration_payment',compact('event_price','event_id', 'user_id','event_title'))->render(),
                ]);
            }elseif($request->guest_screen == 4){
                return response()->json([
                    'html' => view('frontend.auth.demand_registration_completed')->render(),
                ]);
            }elseif($request->guest_screen == 5){
                return response()->json([
                    'html' => view('frontend.auth.event_registration_completed')->render(),
                ]);
            }
            elseif($request->guest_screen == 6){
                return response()->json([
                    'html' => view('frontend.auth.course_registration_form')->render(),
                ]);
            }
        }
    }
}
