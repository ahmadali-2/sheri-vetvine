<?php

namespace App\Http\Controllers\Admins\Webinar;

use App\Http\Controllers\Controller;
use App\Models\Admins\Webinar\SponserTable;
use Illuminate\Http\Request;
use Exception;
use vetvineHelper;
class SponserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sponser = SponserTable::all();
        return view('admins.webinars.sponser.index',compact('sponser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.webinars.sponser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $path   = public_path('admin/eventss/');
            $result = vetvineHelper::saveImage($request->sponser_image, $path);
            SponserTable::create([
                "sponser_name"      => ucwords($request->sponser_name),
                "sponser_link"      => $request->sponser_link,
                "sponser_image"     => $result,
            ]);
            parent::successMessage(' Sponsor saved successfully.');
            return redirect(route('sponsors.index'));
        } catch(Exception $e) {
            parent::dangerMessage(" Sponsor Does Not Created, Please Try  Again");
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
        try {
            $sponser = SponserTable::find($id);
            return view('admins.webinars.sponser.edit', compact('sponser'));
        } catch (Exception $e) {
            parent::dangerMessage(" Sponsor Does Not Edited, Please Try  Again");
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
        try{
            $sponser = Sponsertable::find($id);
            $path   = public_path('admin/eventss/');
            $result = vetvineHelper::updateImage($request->sponser_image_update, $sponser->sponser_image, $path);
            $sponser->update([
                "sponser_name"      => ucwords($request->sponser_name),
                "sponser_link"      => $request->sponser_link_edit,
                "sponser_image"     => $result,
            ]);
            parent::successMessage('Sponsor Updated successfully.');
            return redirect(route('sponsors.index'));
        } catch(Exception $e) {
            parent::dangerMessage(" Sponsor Does Not Updated, Please Try  Again");
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
            $sponser = SponserTable::find($id);
            $sponser->delete();
            parent::successMessage('Sponsor deleted successfully.');
            return redirect()->route('sponsors.index');
        }catch(Exception $e) {
            parent::dangerMessage("Sponsor Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
