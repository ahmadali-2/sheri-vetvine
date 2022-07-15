<?php

namespace App\Http\Controllers\Admins\Memberships;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMemberAndNetworkLevel;
use App\Models\Admins\Memberships\MemberShipPlan;
use App\Models\Generals\Member;
use App\Models\Network;
use App\Models\Admins\Memberships\MemberShipPlanCategory;

class MemberShipPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans =MemberShipPlan::with('plancategory')->get();

        return view('admins.memberships.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nerworklevels =UserMemberAndNetworkLevel::get();
        $planCategories =MemberShipPlanCategory::where('status',1)->get();
        return view('admins.memberships.create',compact('nerworklevels','planCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            MemberShipPlan::create([
                'plan_name'          => ucwords($request->plan_name),
                'plan_description'   => ucfirst($request->plan_description),
                'plan_features'      => ucfirst(json_encode($request->plan_features)),
                'plan_price'         => $request->plan_price,
                'expiry_date'        => $request->expiry_date,
                'member_ship_plan_categories_id' => $request->plancategoryid,
            ]);
            if($Membershipplan->wasRecentlyCreated)
            {
                foreach($request['member_id'] as $member)
                {
                    Member::create([
                    "memberable_id"   =>  $Membershipplan->id,
                    "memberable_type" => 'App\Models\Admins\Memberships\MemberShipPlan',
                    'member_id'       =>  $member,
                    ]);
                }
            }
            parent::successMessage("Plan Created Successfully");
            return redirect()->route('membership.index');
        } catch(\Exception $e){
            parent::dangerMessage("Plan Does Not Created, Please Try Again");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $editPlan = MemberShipPlan::find($id);
       $nerworklevels =UserMemberAndNetworkLevel::all();
       $planCategories =MemberShipPlanCategory::where('status',1)->get();
       $selectedMembers    =   $editPlan->members->pluck('member_id')->toArray();
       return view('admins.memberships.edit',compact('editPlan','nerworklevels','planCategories','selectedMembers'));
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
        try {
            $memberplan =MemberShipPlan::find($id);
            $features =array_filter($request->plan_features);
            $newFeatures =json_encode($features);
            $memberplan->update([
                'plan_name'          => ucwords($request->plan_name),
                'plan_description'   => ucfirst($request->plan_description),
                'plan_features'      => ucfirst($newFeatures),
                'plan_price'         => $request->plan_price,
                'expiry_date'        => $request->expiry_date,
                'member_ship_plan_categories_id' => $request->plancategoryid
            ]);
            $selectedMembers    =   $memberplan->members->pluck('id')->toArray();
            Member::whereIn('id',$selectedMembers)->delete();
            foreach($request['member_id'] as $member)
            {
                Member::create([
                    "memberable_id"   =>  $memberplan->id,
                    "memberable_type" => 'App\Models\Admins\Memberships\MemberShipPlan',
                    'member_id'       =>  $member,
                ]);
            }
            parent::successMessage("Plan Updated Successfully");
            return redirect()->route('membership.index');
        } catch(\Exception $e){
            parent::dangerMessage("Plan Does Not Updated, Please Try Again");
            return redirect()->back();
        }

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
