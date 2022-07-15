<?php

namespace App\Http\Controllers;

use App\Models\Admins\VideosonDemand\VideosOnDemand;
use App\Models\VideoRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoDescriptionController extends Controller
{
    public function video_desc($id, $category)
    {
        // return $rating;
        $authUser = false;

        if(auth()->user()){
            $authUser = true;
        }
        return view('frontend.video_detail', [
            'videos'    => VideosOnDemand::find($id),
            'more_info' => VideosOnDemand::where('category_id', $category)->where('id', '!=', $id)->get(),
            'rating'    => VideoRating::where('video_id', $id)->where('user_id', Auth::id())->first(),
            'videoId' => $id,
            'authUser' => $authUser,
        ]);
    }

    public function video_search(Request $request)
    {
        $category = $request->category;
        $sponser = $request->sponser;
        $presenter = $request->presenter;
        $title = $request->title;

        if (!empty($category && $sponser && $presenter && $title)) {
            $data = VideosOnDemand::whereHas('sponsers', function ($q) use ($sponser) {
                $q->where('sponsers_id', $sponser);
            })->where('category_id', $category)
                ->where('video_title', 'LIKE', '%' . $request->title . "%")
                ->where('presented_by', 'LIKE', '%' . $request->presenter . "%")
                ->get();
        } else if ($title != null && $presenter === null && $sponser === null && $category === null) {
            $data = VideosOnDemand::whereHas('sponsers')
                ->where('video_title', 'LIKE', '%' . $title . "%")
                ->get();
        } else if ($presenter != null && $title === null && $sponser === null && $category === null) {
            $data = VideosOnDemand::whereHas('sponsers')
                ->where('presented_by', 'LIKE', '%' . $presenter . "%")
                ->get();
        } else if ($category != null && $title === null && $presenter === null && $sponser === null) {
            $data = VideosOnDemand::whereHas('sponsers')
                ->where('category_id', $category)
                ->get();
        } else if ($category === null) {
            $data = VideosOnDemand::whereHas('sponsers', function ($q) use ($sponser) {
                $q->where('sponsers_id', $sponser);
            })->where('video_title', 'LIKE', '%' . $title . "%")
                ->where('presented_by', 'LIKE', '%' . $presenter . "%")
                ->get();
        } else if ($presenter === null) {
            $data = VideosOnDemand::whereHas('sponsers', function ($q) use ($sponser) {
                $q->where('sponsers_id', $sponser);
            })->where('video_title', 'LIKE', '%' . $title . "%")
                ->where('category_id', $category)
                ->get();
        } else if ($title === null) {
            $data = VideosOnDemand::whereHas('sponsers', function ($q) use ($sponser) {
                $q->where('sponsers_id', $sponser);
            })
                ->where('category_id', $category)
                ->get();
        } else {
            $data = VideosOnDemand::whereHas('sponsers')->where('category_id', $category)
                ->where('video_title', 'LIKE', '%' . $title . "%")
                ->where('presented_by', 'LIKE', '%' . $presenter . "%")
                ->get();
        }

        return response()->json([
            'html' => view('frontend.pages.search_videos', compact('data'))->render(),
        ]);
    }

    public function rating_videos(Request $request)
    {
        $length = $request->length;
        $user_id = $request->user_id;
        $video_id = $request->video_id;

        $exists = VideoRating::where('user_id', Auth::id())->where('video_id', $video_id)->count();

        if ($exists > 0) {
            VideoRating::where('user_id', Auth::id())->where('video_id', $video_id)->update([
                'rating' => $length,
            ]);
        } else {
            VideoRating::create([
                'video_id'=> $video_id,
                'user_id' => Auth::id(),
                'rating'  => $length,
            ]);
        }
    }
}
