<?php

namespace App\Http\Controllers\Admins\Webinar;

use App\Http\Controllers\Controller;
use App\Models\Admins\Webinar\CategoryEvent;
use Illuminate\Http\Request;
use Exception;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EventCategory = CategoryEvent::all();
        return view('admins.webinars.category.index',compact('EventCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.webinars.category.create');
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
        $input = $request->all();
        try{
            CategoryEvent::create([
                "category_title"      => ucwords($input['category_title']),
            ]);
            parent::successMessage(' Event Category saved successfully.');
            return redirect(route('webinars-category.index'));
        } catch(Exception $e) {
            parent::dangerMessage(" Event Category Does Not Created, Please Try  Again");
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
            $EventCategory = CategoryEvent::find($id);
            return view('admins.webinars.category.edit',compact('EventCategory'));
        } catch(Exception $e) {
            parent::dangerMessage(" Event Category Does Not Edited, Please Try  Again");
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
        $input = $request->all();
        try{
            CategoryEvent::find($id)->update([
                "category_title"      => ucwords($input['category_title']),
            ]);
            parent::successMessage('Event Category Updated successfully.');
            return redirect(route('webinars-category.index'));
        } catch(Exception $e) {
            parent::dangerMessage(" Event Category Does Not Updated, Please Try  Again");
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
            $EventCategory = CategoryEvent::find($id);
            $EventCategory->delete();
            parent::successMessage('Event Category deleted successfully.');
            return redirect()->route('webinars-category.index');
        }catch(Exception $e) {
            parent::dangerMessage("Event Category Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
