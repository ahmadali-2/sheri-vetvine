<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.staticpages.termscondition.privacypolicy.index',[
            'privacy' => PrivacyPolicy::where('page_title', '!=', '')->orWhere('page_desc', '!=', '')->first()
        ]);
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

        $exists = PrivacyPolicy::count();
        try
        {
            if($exists === 1){
                PrivacyPolicy::where('page_title', '!=', '')->orWhere('page_desc', '!=', '')->update([
                    'page_title' => $request->page_title,
                    'page_desc'  => $request->pageDesc
                ]);
            }else{
                PrivacyPolicy::create([
                    'page_title' => $request->page_title,
                    'page_desc'  => $request->pageDesc
                ]);
            }
            parent::successMessage('Privacy & Policy added successfully.');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            parent::errorMessage('Something went wrong.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        //
    }
}
