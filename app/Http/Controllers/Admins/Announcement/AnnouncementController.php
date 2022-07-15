<?php

namespace App\Http\Controllers\Admins\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Admins\Announcement\Announcement;
use App\Models\Generals\Member;
use Illuminate\Http\Request;
use App\Models\UserMemberAndNetworkLevel;
use Exception;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements  =   Announcement::all();
        return view('admins.announcement.index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members    =   UserMemberAndNetworkLevel::all();
        return view('admins.announcement.create',compact('members'));
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
            $announcemnets  = Announcement::create([
            "announcement_title"   => ucwords($input['announcement_title']),
            "description"          => ucfirst($input['description']),
            ]);
            if($announcemnets->wasRecentlyCreated)
            {
                foreach($input['member_id'] as $member)
                {
                    Member::create([
                        "memberable_id"   =>  $announcemnets->id,
                        "memberable_type" => 'App\Models\Admins\Announcement\Announcement',
                        'member_id'       => $member,
                    ]);
                }
            }
            parent::successMessage('Announcement saved successfully.');
            return redirect(route('announcements.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Announcement Does Not Created, Please Try  Again");
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
        try{
            $members            =   UserMemberAndNetworkLevel::all();
            $announcements      =   Announcement::find($id);
            $selectedMembers    =   $announcements->members->pluck('member_id')->toArray();
            return view('admins.announcement.edit',compact('announcements','members','selectedMembers'));
        } catch(Exception $e) {
            parent::dangerMessage("Announcement Does Not Edited, Please Try  Again");
            return redirect()->back();
        }
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
        $input          = $request->all();
        $announcements  =   Announcement::find($id);
        try{
               $announcements->update([
                "announcement_title"   => ucwords($input['announcement_title']),
                "description"          => ucfirst($input['description']),
            ]);
            $selectedMembers    =   $announcements->members->pluck('id')->toArray();
            Member::whereIn('id',$selectedMembers)->delete();
            foreach($input['member_id'] as $member)
            {
                Member::create([
                    "memberable_id"   =>  $announcements->id,
                    "memberable_type" => 'App\Models\Admins\Announcement\Announcement',
                    'member_id'       => $member,
                ]);
            }
            parent::successMessage('Announcement updated successfully.');
            return redirect(route('announcements.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Announcement Does Not Updated, Please Try  Again");
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
            Announcement::find($id)->delete();
            parent::successMessage('Announcement Deleted successfully.');
            return redirect(route('announcements.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Announcement Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
