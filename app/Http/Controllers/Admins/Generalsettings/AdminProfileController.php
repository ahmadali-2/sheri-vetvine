<?php

namespace App\Http\Controllers\Admins\Generalsettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admins\GeneralSetting\GeneralSetting;
use Illuminate\Support\Facades\Hash;
use Auth;
use vetvineHelper;
use App\Services\Shared\ManageProfileService;

use function GuzzleHttp\Promise\all;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            return view('admins.generalsettings.adminprofile');
    }
    public function generalsetting()
    {
        $data = GeneralSetting::first();
        return view('admins.generalsettings.generalsetting', compact('data'));
    }
    public function storegeneralsetting(Request $request)
    {
        $path = public_path('admin/generalsetting/');
        if(!empty($request->setting_id)) {
            $dbimage = GeneralSetting::find($request->setting_id);
            $result = vetvineHelper::updateImage($request->logo,$dbimage->logo, $path);
        } else {
            $result = vetvineHelper::saveImage($request->logo, $path);

        }

        $input = $request->all();
        try {
                GeneralSetting::UpdateOrcreate(['id' => $request->setting_id ?? ''],[
                    "facebook"               => $input['facebook'],
                    "twitter"                => $input['twitter'],
                    "instagram"              => $input['instagram'],
                    "youtube"                => $input['youtube'],
                    "logo"                   => $result,
                    "email"                  => $input['email'],
                    "phone_no"               => $input['phone_no'],
                    "mission_statement"      => ucfirst($input['mission_statement']),
                ]);
                parent::successMessage('Settings saved successfully.');
                return redirect()->back();
        } catch (Exception $e) {
            parent::dangerMessage("Settings not saved, Please Try  Again");
            return redirect()->back();
        }
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
    public function store(Request $request , ManageProfileService $profile)
    {
        $profile->updateProfile($request) == 'updated'
        ? parent::successMessage("Your Profile Updated Successfully")
        : parent::dangerMessage("Your Profile Does Not Updated , Please Try Again");
        return redirect()->back();
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
