<?php

namespace App\Http\Controllers\VetvineUsers\MemberShips;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Memberships\MemberShipPlan;
use App\Models\Admins\Memberships\BuyMemberShipPlan;

use Session;
use Stripe;
use Exception;
class StripePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans =MemberShipPlan::with('plancategory')->get();
        return view('vetvineUsers.memberships.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkUser =BuyMemberShipPlan::where('user_id',$request->user_id)->first();
        if(!empty($checkUser)){
            parent::warningMessage("You Already Subscribed A Member Ship Plan");
            parent::warningMessage("Please Contact With Admin To Proceed Your Query");
            return redirect()->back();
        }
        try{



            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeResponse =Stripe\Charge::create ([
                    "amount" => $request->plan_price,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Vetvine Payment Subscription"
            ]);

            BuyMemberShipPlan::create([
                'transaction_id' => $stripeResponse->id,
                'user_id' => $request->user_id,
                'member_ship_plan_id' => $request->membershipplan_id,
                'amount' => $request->plan_price,
            ]);
        parent::successMessage("Your Plan Subscribed Successfully");
        parent::successMessage("Your Transaction Id " .$stripeResponse->id);
        return redirect()->route('usermemberships.index');
        } catch(Exception $e) {
            parent::dangerMessage("Something Went Wrong Payment Does Not Proceed");
            parent::dangerMessage("Please Try Again ");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $plan =MemberShipPlan::with('plancategory')->find($id);
        return view('vetvineUsers.memberships.buymembershipform',compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
