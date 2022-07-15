<?php

namespace App\Http\Controllers\Admins\Webinar;

use App\Http\Controllers\Controller;
use App\Models\Admins\Webinar\BuyEventPlan;
use App\Models\Admins\Webinar\Event;
use App\Models\User;
use Illuminate\Http\Request;

class BuyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $memberships =Event::with('events')->get();
        $results =$memberships->map(function($event){
            $event->totalUsersInPlans =BuyEventPlan::where('event_id', $event->id)->count('user_id');
            return $event;
        });
        return view('admins.webinars.buyevent.index',compact('memberships'));
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
         $membership =Event::with('buyeventplan','user')->find($id);
        return view('admins.webinars.buyevent.viewalleventusers',compact('membership'));
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
    public function userEventHistory($id)
    {
        $userHistory =User::with('buyevents')->find($id);
        return view('admins.webinars.buyevent.eventuserhistory',compact('userHistory'));
    }
}
