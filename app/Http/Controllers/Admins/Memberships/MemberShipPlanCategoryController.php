<?php

namespace App\Http\Controllers\Admins\Memberships;

use App\Http\Controllers\Controller;
use App\Models\Admins\Memberships\MemberShipPlanCategory;
use Exception;
use Illuminate\Http\Request;

class MemberShipPlanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planCategories =MemberShipPlanCategory::all();
        return view('admins.memberships.category.index',compact('planCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.memberships.category.create');

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
        MemberShipPlanCategory::create([
            'category_name' => ucwords($request->category_name),
            'status'        => ($request->status == "on") ? 1 : 0,
        ]);
        parent::successMessage("Plan Category Created Successfully");
        return redirect()->route('membership-category.index');

       } catch(Exception $e) {
           dd($e->getMessage());
           parent::dangerMessage("Plan Category Does Not Created , Please Try Again");
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
        $editCategory =MemberShipPlanCategory::find($id);
        return view('admins.memberships.category.edit',compact('editCategory'));
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
            $planCategory =MemberShipPlanCategory::find($id);
            $planCategory->update([
                'category_name' => ucwords($request->category_name),
                'status'        => ($request->status == "on") ? 1 : 0,
            ]);
            parent::successMessage("Plan Category Update Successfully");
            return redirect()->route('membership-category.index');

           } catch(Exception $e) {
               parent::dangerMessage("Plan Category Does Not Updated , Please Try Again");
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
            $plancategory =MemberShipPlanCategory::find($id);
            $plancategory->delete();
            parent::successMessage("Record deleted Successfully");
            return redirect()->back();
        } catch(Exception $e) {
            parent::dangerMessage("Record Does Not Deleted, Please Try Again");
            return redirect()->back();
        }
    }
}
