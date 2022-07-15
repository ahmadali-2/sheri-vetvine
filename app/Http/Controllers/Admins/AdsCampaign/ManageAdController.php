<?php

namespace App\Http\Controllers\Admins\AdsCampaign;

use App\Http\Controllers\Controller;
use App\Models\Admins\Advertisement\Ad;
use App\Models\Admins\Advertisement\AdCampaign;
use vetvineHelper;
use Illuminate\Http\Request;
use Exception;

class ManageAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('admins.advertisement.adsmanage.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisement = AdCampaign::where('status', '1')->get();
        return view('admins.advertisement.adsmanage.create', compact("advertisement"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path   = public_path('admin/advertisement/');
        $result = vetvineHelper::saveImage($request->ad_media, $path);
        $input  = $request->all();
        try{
            Ad::create([
                "ad_name"                  =>  ucwords($input['ad_name']),
                "ad_media"                 =>  $result,
                "banner_image_url"         =>  $input['banner_image_url'],
                "campaign_id"              =>  $input['campaign_id']
            ]);
            parent::successMessage('Advertisement saved successfully.');
            return redirect(route('ads-manage.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Advertisement Does Not Created, Please Try  Again");
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
        $ad = Ad::with('campaigns')->find($id);
        $advertisement = AdCampaign::where('status', '1')->get();
        return view('admins.advertisement.adsmanage.edit',compact('ad','advertisement'));
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
            $ad     = Ad::find($id);
            $path   = public_path('admin/advertisement/');
            $result = vetvineHelper::updateImage($request->ad_media_update,$ad->ad_media, $path);
            $ad->update([
             'ad_name'                      =>  ucwords($request->input('ad_name')),
             'ad_media'                     =>  $result,
             'banner_image_url'             =>  $request->input('banner_image_url'),
             'campaign_id'                  =>  $request->input('campaign_id'),
             "status"                       =>  $request->input('status'),

            ]);
             parent::successMessage('Advertisement updated successfully.');
             return redirect(route('ads-manage.index'));
        } catch(Exception $e) {
            dd($e->getMessage());
             parent::dangerMessage("Advertisement Does Not Updated, Please Try  Again");
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
            $ad = Ad::find($id);
            $ad->delete();
            parent::successMessage('Advertisement deleted successfully.');
            return redirect()->route('ads-manage.index');
        }catch(Exception $e) {
            parent::dangerMessage("Advertisement Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
