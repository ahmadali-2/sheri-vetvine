<?php

namespace App\Http\Controllers\Admins\Forum;

use App\Http\Controllers\Controller;
use App\Models\Admins\Forum\CategoryForum;
use Exception;
use Illuminate\Http\Request;

class ForumCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories   =   CategoryForum::all();
        return view('admins.forums.categoryindex',compact('categories'));
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
        
        $input = $request->all();
        try{
            CategoryForum::create([
                "category_title"            => ucwords($input['category_title']),
                "category_description"      => ucwords($input['category_description']),
            ]);
            parent::successMessage('Category saved successfully.');
            return redirect(route('forums-category.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Category Does Not Created, Please Try  Again");
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
            $CategoryForum = CategoryForum::find($id);
            return view('admins.forums.edit-forum-category',compact('CategoryForum'));
        } catch(Exception $e) {
            parent::dangerMessage("Category Does Not Edited, Please Try  Again");
            return $e->getMessage();//redirect()->back();
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
            CategoryForum::find($id)->update([
                "category_title"            => ucwords($input['category_title']),
                "category_description"      => ucwords($input['category_description']),
            ]);
            parent::successMessage('Category Updated successfully.');
            return redirect(route('forums-category.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Category Does Not Updated, Please Try  Again");
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
            CategoryForum::find($id)->delete();
            parent::successMessage('Category Deleted successfully.');
            return redirect(route('forums-category.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Category Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
