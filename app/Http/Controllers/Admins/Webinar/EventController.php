<?php

namespace App\Http\Controllers\Admins\Webinar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Webinar\Event;
use App\Models\Admins\Webinar\CategoryEvent;
use App\Models\Admins\Webinar\ReviewRating;
use App\Models\Admins\Webinar\SponserTable;
use App\Models\Sponser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use vetvineHelper;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::with('events','sponsermember','events', 'sponsers' ,'members')->get();
        return view('admins.webinars.index',compact('event'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventcategory = CategoryEvent::all();
        $sponser = SponserTable::get();
        return view('admins.webinars.create', compact('eventcategory','sponser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try{
        $user   = Auth::user()->id;
        $path   = public_path('admin/eventss/');
        $result = vetvineHelper::saveImage($request->main_photo, $path);
        $input  = $request->all();
            $event =Event::create([
                "category_id"                   =>   $input['category_id'],
                "user_id"                       =>   $user,
                "event_title"                   =>   ucwords($input['event_title']),
                "tags"                          =>   $input['tags'],
                "main_photo"                    =>   $result,
                "event_add_ytlink"              =>   $input['event_add_ytlink'],
                "date"                          =>   $input['date'],
                "time"                          =>   $input['time'],
                "presenter_one"                 =>   ucwords($input['presenter_one']),
                "presenter_one_url"             =>   $input['presenter_one_url'],
                "presenter_two"                 =>   ucwords($input['presenter_two']),
                "presenter_two_url"             =>   $input['presenter_two_url'],
                "presenter_three"               =>   ucwords($input['presenter_three']),
                "presenter_three_url"           =>   $input['presenter_three_url'],
                "event_description"             =>   ucfirst($input['event_description']),
                "vet_pet_prof_fee"              =>   $input['vet_pet_prof_fee'],
                "pet_owner_premium_fee"         =>   $input['pet_owner_premium_fee'],
                "pet_owner_fee"                 =>   $input['pet_owner_fee'],
                "vet_pet_prof_premium_fee"      =>   $input['vet_pet_prof_premium_fee'],
                "timezone_url"                  =>   $input['timezone_url']
            ]);
            if($event->wasRecentlyCreated)
            {
                foreach($request['sponser_id'] as $sponser)
                {
                    Sponser::create([
                    "sponserable_id"   =>  $event->id,
                    "sponserable_type" => 'App\Models\Admins\Webinar\Event',
                    'sponser_id'       => $sponser,
                    ]);
                }
            }
            parent::successMessage('Event saved successfully.');
            return redirect(route('webinars.index'));
        } catch(Exception $e) {
            // dd($e->getMessage());
            parent::dangerMessage("Continue Education Event Does Not Created, Please Try  Again");
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
            $event = Event::find($id);
            $eventcategory = CategoryEvent::all();
            $sponser = SponserTable::all();
            $selectedMembers    =   $event->sponsers->pluck('sponser_id')->toArray();
            return view('admins.webinars.edit',compact('event','sponser','eventcategory','selectedMembers'));
        } catch(Exception $e) {
            parent::dangerMessage("Event Does Not Edited, Please Try  Again");
            return $e->getMessage();
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
            try {
            $user   = Auth::user()->id;
            $event  = Event::find($id);
            $path   = public_path('admin/eventss/');
            $result = vetvineHelper::updateImage($request->main_photo_update, $event->main_photo, $path);
            $event->update([
                    "category_id"                   =>   $request->input('category_id'),
                    "user_id"                       =>   $user,
                    "event_title"                   =>   $request->input('event_title'),
                    "tags"                          =>   $request->input('tags'),
                    "main_photo"                    =>   $result,
                    "event_add_ytlink"              =>   $request->input('event_add_ytlink'),
                    "date"                          =>   $request->input('date'),
                    "time"                          =>   $request->input('time'),
                    "presenter_one"                 =>   $request->input('presenter_one'),
                    "presenter_one_url"             =>   $request->input('presenter_one_url'),
                    "presenter_two"                 =>   $request->input('presenter_two'),
                    "presenter_two_url"             =>   $request->input('presenter_two_url'),
                    "presenter_three"               =>   $request->input('presenter_three'),
                    "presenter_three_url"           =>   $request->input('presenter_three_url'),
                    "event_description"             =>   $request->input('event_description'),
                    "vet_pet_prof_fee"              =>   $request->input('vet_pet_prof_fee'),
                    "pet_owner_premium_fee"         =>   $request->input('pet_owner_premium_fee'),
                    "pet_owner_fee"                 =>   $request->input('pet_owner_fee'),
                    "vet_pet_prof_premium_fee"      =>   $request->input('vet_pet_prof_premium_fee'),
                    'timezone_url'                  =>   $request->input('timezone_url')
                ]);
                $selectedMembers    =   $event->sponsers->pluck('id')->toArray();
                Sponser::whereIn('id',$selectedMembers)->delete();
                foreach($request['sponser_id'] as $sponser)
                {
                    Sponser::create([
                    "sponserable_id"   =>  $event->id,
                    "sponserable_type" => 'App\Models\Admins\Webinar\Event',
                    'sponser_id'       => $sponser,
                    ]);
                }
                parent::successMessage('Event updated successfully.');
                return redirect(route('webinars.index'));
            } catch (Exception $e) {
                // dd($e->getMessage());
                parent::dangerMessage("Continue Education Event Does Not Updated, Please Try  Again");
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
            $event = Event::find($id);
            $event->delete();
            parent::successMessage('Event Deleted Successfully.');
            return redirect()->route('webinars.index');
        }catch(Exception $e) {
            parent::dangerMessage("Event Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }

}
