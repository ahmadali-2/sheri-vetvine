<?php

namespace App\Http\Controllers\Admins\VideosOnDemand;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Admins\VideosonDemand\VideosOnDemand;
use App\Models\Admins\Webinar\CategoryEvent;
use App\Models\Admins\Webinar\SponserTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use vetvineHelper;

// use App\Models\Sponser;
// use Sponser

class VideosOnDemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideosOnDemand::all();
        return view('admins.videosondemand.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryEvent::all();
        return view('admins.videosondemand.create', [
            'category' => $category,
            'sponsor' => SponserTable::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $request->validated();
        $input = $request->all();
        // dd( $input);
        $user = Auth::user()->id;
        $path = public_path('vetvineUsers/videos/');
        $video = vetvineHelper::saveImage($request->post_add_video, $path);
        // return $video;
        try {
            $videos = VideosOnDemand::create([
                "user_id" => $user,
                "video_title" => ucwords($input['video_title']),
                "video_link" => $input['video_link'],
                "video_description" => ucfirst($input['video_description']),
                "post_add_video" => $video,
                "presented_by" => $input['presented_by'],
                'category_id' => $input['category'],
                'sponsor_id' => '1',
            ]);

            $videos->sponsers()->attach($request->sponser_id);
            parent::successMessage('Video saved successfully.');
            return redirect(route('videos-on-demand.index'));
        } catch (Exception $e) {
            // dd($e);
            parent::dangerMessage("Video Does Not Created, Please Try  Again");
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
    public function videodata(Request $request)
    {
        $userVideo = VideosOnDemand::find($request->id);
        return $userVideo;
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
            $video = VideosOnDemand::find($id);
            $category = CategoryEvent::all();
            return view('admins.videosondemand.edit', compact('video', 'category'));
        } catch (Exception $e) {
            parent::dangerMessage("Post Does Not Edited, Please Try  Again");
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
        // return $request;
        if ($request->category_id === null) {
            $category = $request->category;
        } else {
            $category = $request->category_id;
        }

        $input = $request->all();
        $path = public_path('vetvineUsers/videos/');
        $video = vetvineHelper::saveImage($request->post_add_video, $path);
        $user = Auth::user()->id;
        try {
            VideosOnDemand::find($id)->update([
                "user_id" => $user,
                "video_title" => ucwords($input['video_title']),
                "video_link" => $input['video_link'],
                "video_description" => ucfirst($input['video_description']),
                "post_add_video" => $video,
                "presented_by" => $input['presented_by'],
                "category_id" => $category,
            ]);
            parent::successMessage('Video Updated successfully.');
            return redirect(route('videos-on-demand.index'));
        } catch (Exception $e) {
            parent::dangerMessage("Video Does Not Updated, Please Try  Again");
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
        // dd($id);
        // return $id;
        try {
            VideosOnDemand::find($id)->delete();
            parent::successMessage('Video Deleted successfully.');
            return redirect(route('videos-on-demand.index'));
        } catch (Exception $e) {
            dd($e->getMessage());
            // return false;
            parent::dangerMessage("Video Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
