<?php

namespace App\Http\Controllers\Admin\GeneralSettings;

use App\Http\Controllers\Controller;
use App\Models\Admin\GeneralSettings\GeneralSetting;
use Exception;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        return view('admin.generalsettings.general_settings', compact('generalSettings'));
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
        try {
            $generalSetting = GeneralSetting::first();
            if (!empty($generalSetting)) {
                $generalSetting->update([
                    'general_email'   => $request->general_email ?? '',
                    'general_address' => $request->general_address ?? '',
                    'general_contact' => $request->general_contact ?? '',
                    'fb_link'         => $request->fb_link ?? '',
                    'twitter_link'    => $request->twitter_link ?? '',
                    'inst_link'       => $request->inst_link ?? '',
                    'contact_address' => $request->contact_address ?? '',
                    'contact_email'   => $request->contact_email ?? '',
                    'contact_phone'   => $request->contact_phone ?? '',
                    'footer_copyright_text'   => $request->footer_copyright_text ?? '',
                ]);
                parent::successMessage("General Settings Updated Successfully");

                return back();
            } else {
                GeneralSetting::create($request->all());
                parent::successMessage("General Settings Updated Successfully");
                return back();
            }
        } catch (Exception $e) {
            parent::dangerMessage($e->getMessage());
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
