<?php

namespace App\Http\Controllers\Admins\Memberships;

use App\Http\Controllers\Controller;
use App\Models\Admins\Memberships\BuyMemberShipPlan;
use App\Models\Admins\Memberships\MemberShipPlan;
use Illuminate\Http\Request;
use App\Models\User;

class BuyMemberShipPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships =MemberShipPlan::with('plancategory')->get();
        $results =$memberships->map(function($plan){
            $plan->totalUsersInPlans =BuyMemberShipPlan::where('member_ship_plan_id', $plan->id)->count('user_id');
            return $plan;
        });


        return view('admins.memberships.buymembership.index',compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.memberships.buymembership.viewallusers',compact('memberships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membership =MemberShipPlan::with('buymemberships')->find($id);
        return view('admins.memberships.buymembership.viewallusers',compact('membership'));
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

    public function userHistory($id)
    {
        $userHistory =User::find($id);
        return view('admins.memberships.buymembership.userhistory',compact('userHistory'));
    }
}
