<?php

namespace App\Http\Controllers\VetvineUsers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VetvineUsers\Settings\Locale;
use App\Models\Generals\TimeZone;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $languages  = Locale::all();
        $timezones  = TimeZone::all();
        return view('vetvineUsers.Settings.general',compact('languages','timezones'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $user = Auth::user()->id;
            $user= User::find($user);
            $user->update([
                'email'         => $request->emailaddress,
                'timezone_id'   => $request->timezone_id,
                'locale_id'     => $request->locale_id,
            ]);
            parent::successMessage("General Settings Saved Successfully!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            parent::dangerMessage("General Setting Not Saved! Please Try Again.");
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
