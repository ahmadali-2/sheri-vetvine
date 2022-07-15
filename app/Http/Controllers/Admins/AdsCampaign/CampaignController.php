<?php

namespace App\Http\Controllers\Admins\AdsCampaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Advertisement\AdCampaign;
use App\Models\UserMemberAndNetworkLevel;
use App\Models\Generals\Member;
use App\Models\Membership;
use Response;
use Exception;
use phpDocumentor\Reflection\Types\Null_;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adCampaigns = AdCampaign::with('networklevel')->get();
        return view('admins.advertisement.adcampaigns.index',compact('adCampaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adcampaigns = UserMemberAndNetworkLevel::get()->reject(function($q){
            return  $q->parent_id == Null;
        })->map(function($q){
            return $q;
        });
        return view('admins.advertisement.adcampaigns.create',compact('adcampaigns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        try{
              $adCampaign = AdCampaign::create([
                "campaign_name"            => ucwords($input['campaign_name']),
                "start_date"               => $input['start_date'],
                "end_date"                 => $input['end_date'],
                "total_views_allowed"      => $input['total_views_allowed'],
                "total_clicks_allowed"     => $input['total_clicks_allowed'],
                "min_ctr"                  => $input['min_ctr'],
            ]);
            if($adCampaign->wasRecentlyCreated)
            {
                foreach($input['network_id'] as $member)
                {
                    Member::create([
                    "memberable_id"   =>  $adCampaign->id,
                    "memberable_type" => 'App\Models\Admins\Advertisement\AdCampaign',
                    'member_id'       => $member,
                    ]);
                }
            }
            parent::successMessage('Campaign saved successfully.');
            return redirect(route('ads-campaign.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Campaign Does Not Created, Please Try  Again");
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
        $adCampaigns     = AdCampaign::find($id);
        $selectedMembers = $adCampaigns->members->pluck('member_id')->toArray();
        $networklevel    = UserMemberAndNetworkLevel::get()->reject(function($q){
            return  $q->parent_id == Null;
        })->map(function($q){
            return $q;
        });
        return view('admins.advertisement.adcampaigns.edit',compact('adCampaigns','networklevel','selectedMembers'));
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
        try{
           $adCampaign = AdCampaign::find($id);
           $adCampaign->update([
            'campaign_name'           =>  ucwords($request->input('campaign_name')),
            'start_date'              =>  $request->input('start_date'),
            'end_date'                =>  $request->input('end_date'),
            'total_views_allowed'     =>  $request->input('total_views_allowed'),
            'total_clicks_allowed'    =>  $request->input('total_clicks_allowed'),
            'min_ctr'                 =>  $request->input('min_ctr'),
            "status"                  =>  $request->input('status'),
           ]);
            $selectedMembers    =   $adCampaign->members->pluck('id')->toArray();
            Member::whereIn('id',$selectedMembers)->delete();
            foreach($request['network_id'] as $member)
                {
                    Member::create([
                    "memberable_id"   =>  $adCampaign->id,
                    "memberable_type" => 'App\Models\Admins\Advertisement\AdCampaign',
                    'member_id'       => $member,
                    ]);
                }
            parent::successMessage('Ad Campaign updated successfully.');
            return redirect(route('ads-campaign.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Campaign Does Not Updated, Please Try  Again");
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
        try{
            $adCampaign = AdCampaign::find($id);
            $adCampaign->delete();
            parent::successMessage('Ad Campaign deleted successfully.');
            return redirect()->route('ads-campaign.index');
        }catch(Exception $e) {
            parent::dangerMessage("Campaign Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
