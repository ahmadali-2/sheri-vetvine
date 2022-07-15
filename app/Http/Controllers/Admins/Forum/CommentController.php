<?php

namespace App\Http\Controllers\Admins\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Forum\Post;
use App\Models\Admins\Forum\Comment;
use App\Models\Share;
use Auth;
use Exception;

class CommentController extends Controller
{
    public function showComments(Request $request){
        // dd($request->all());
        $comments = null;
        if($request->type == 'post'){
            $post = Post::with('comments')->where('id',$request->post_id)->first();

        }else{
            $post = Share::with('comments')->where('id',$request->post_id)->first();
        }
        $comments = $post->comments;
        return response()->json([
            'html' => view('frontend.pages.forums.replies', [
                'comments' => $comments,
                'post_id' => $request->post_id,
                'type' =>$request->type,
                'ce' => $request->ce,
            ])->render(),
            'count' => count($comments),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if(auth()->user()){
            if(isset(auth()->user()->email_verified_at)){
                if($request->comment == '')
                {
                    return response()->json([
                        'code' => 400,
                        'message' => 'Comment cannot be empty!',
                    ]);
                }
                else
                {
                $comment = new Comment();

                $comment->comment = $request->comment;

                $comment->ce = $request->ce;

                $comment->user()->associate($request->user());

                if($request->type == 'post'){
                    $post = Post::find($request->post_id);
                }else{
                    $post = Share::find($request->post_id);
                }

                $post->comments()->save($comment);

                if($request->ajax()){
                    return response()->json([
                        'code' => 200,
                        'message' => 'Comment added successfully!',
                    ]);
                }
                }
            }else{
                return response()->json([
                    'code' => 400,
                    'message' => 'Please verify your email first!',
                ]);
            }
        }else{
            return response()->json([
                'code' => 400,
                'message' => 'Please login to continue!',
            ]);
        }
    }
    public function replyStore(Request $request)
    {
        if(auth()->user()){
            if(isset(auth()->user()->email_verified_at)){
                if($request->reply == '')
                {
                    return response()->json([
                        'code' => 400,
                        'message' => 'Reply cannot be empty!',
                    ]);
                }
                else
                {
                    $reply = new Comment();

                    $reply->comment = $request->get('reply');

                    $reply->user()->associate($request->user());

                    $reply->parent_id = $request->get('comment_id');

                    $reply->ce = $request->ce;

                    if($request->type == 'post'){
                        $post = Post::find($request->get('post_id'));
                    }else{
                        $post = Share::find($request->get('post_id'));
                    }

                    $post->comments()->save($reply);

                    return response()->json([
                        'code' => 200,
                        'message' => 'Reply added successfully!',
                    ]);
                }

            }else{
                return response()->json([
                    'code' => 400,
                    'message' => 'Please verify your email first!',
                ]);
            }
        }else{
            return response()->json([
                'code' => 400,
                'message' => 'Please login to continue!',
            ]);
        }
    }
    public function destroy($id)
    {
        if(auth()->user()){
            if(isset(auth()->user()->email_verified_at)){
                try{
                    Comment::find($id)->delete();
                    return response()->json([
                        'code' => 200,
                        'message' => 'Comment deleted successfully!',
                    ]);
                } catch(Exception $e) {
                    return response()->json([
                        'code' => 400,
                        'message' => 'Error in operation!',
                    ]);
                }
            }else{
                return response()->json([
                    'code' => 400,
                    'message' => 'Please verify your email first!',
                ]);
            }
        }else{
            return response()->json([
                'code' => 400,
                'message' => 'Please login to continue!',
            ]);
        }
    }
}
