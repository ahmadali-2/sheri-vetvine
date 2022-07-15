<?php

namespace App\Http\Controllers\Admins\Webinar;

use App\Http\Controllers\Controller;
use App\Models\Admins\Webinar\ReviewRating;
use Illuminate\Http\Request;
use Exception;

class ReviewController extends Controller
{
    public function reviewstore(Request $request)
    {
        $checkUser =ReviewRating::where('user_id',Auth()->user()->id)->where('event_id', $request->event_id)->first();
        if(!empty($checkUser)){
            parent::warningMessage("You Already Posted A Review On This Event");
            return redirect()->route('upcoming_webinars');
        }
        try{
        $review = new ReviewRating();
        $review->event_id = $request->event_id;
        $review->user_id = Auth()->user()->id;
        $review->star_rating = $request->rating;
        $review->comments= $request->comment;
        $review->save();
        parent::successMessage('Your Review Has Been Submitted Successfully.');
        return redirect()->back();
        } catch(Exception $e) {
        parent::dangerMessage("Review Does Not Submitted, Please Try  Again");
        return redirect()->back();      }
    }
    public function commentupdate(Request $request)
    {
        $commentData = array();
        if(isset($request->rating)){
            $commentData['star_rating'] = $request->rating;
        }
        if(isset($request->comment)){
            $commentData['comments'] = $request->comment;
        }
        try {
            if ($request->ajax()) {
                ReviewRating::find($request->review_id)
                ->update($commentData);
                return response()->json([
                    'success' => 'Review Updated Successfully.'
                ]);
            }
        }
        catch(Exception $e) {
            return response()->json(['success' => false]);
        }
    }
    public function edit(Request $request)
    {
        $review  = ReviewRating::where('id',$request->id)->first();
        return [
            'succces' => true,
            'review' => $review
        ];
    }

    // public function Reviewdelete(Request $request)
    // {

    //     if (auth()->user()->id == $request->user_id) {
    //         $review=ReviewRating::find($request->review_id);
    //         if ($review != null) {
    //             $review->delete();
    //             parent::successMessage('Your Review Has Been Deleted Successfully.');
    //             return redirect()->route('upcoming_webinars');
    //         }
    //     }
    //     else{
    //         parent::dangerMessage("You Can't Delete This Review");
    //         return redirect()->route('upcoming_webinars');
    //     }
    // }
}
