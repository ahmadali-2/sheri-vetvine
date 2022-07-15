<?php

namespace App\Http\Controllers\Admins\Forum;

use App\Http\Controllers\Controller;
use App\Models\Admins\Forum\Forum;
use App\Models\Admins\Forum\Post;
use App\Models\PostActivity;
use Exception;
use vetvineHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user   = Auth::user()->id;
        $path   = public_path('vetvineUsers/posts/');
        $result = vetvineHelper::saveImage($request->post_photo, $path);
        $path   = public_path('vetvineUsers/videos/');
        $video  = vetvineHelper::saveImage($request->post_add_video, $path);
        try {
            $post = new Post();
            $post->forum_id = $request->forum_id;
            $post->post_title = ucwords($request->post_title);
            $post->post_photo = $result;
            $post->user_id = $user;
            $post->post_description = ucfirst($request->description);
            $post->post_link = $request->post_link;
            $post->post_add_video = $video;
            $post->save();

            PostActivity::create([
                'post_id' => $post->id,
            ]);
            
            parent::successMessage('Post saved successfully.');
            return redirect(route('getForumPosts',$request->forum_id));
        } catch (Exception $e) {
            parent::dangerMessage("Post Does Not Created, Please Try  Again");
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
        $posts = Post::with('user')->where('forum_id','!=','Null')->find($id);
        return view('frontend.pages.forums.post_detail',compact('posts'));
    }

    public function createPost($id)
    {
        if(auth()->user()){
            if(auth()->user()->email_verified_at){
                $forum = Forum::find($id);
                return view('frontend.pages.forums.create_post',compact('forum'));
            }else{
                parent::dangerMessage('Please verify your email first!');
                return back();
            }
        }
        else{
            parent::dangerMessage('User not login, Please login first!');
            return back();
        }
    }

    public function forumPostList($id)
    {
        $forum = Forum::find($id);
        $posts = $forum->posts;
        return view('frontend.pages.forums.forums_post',compact('posts','forum'));
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
            $post = Post::find($id);
            return view('frontend.pages.forums.edit-forumpost',compact('post'));
        } catch(Exception $e) {
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
        try {
            $user   = Auth::user()->id;
            Post::find($id)->update([
                "forum_id"               =>  $request->forum_id,
                "user_id"                =>  $user,
                "post_title"             =>  ucwords($request->post_title),
                "post_description"       =>  ucfirst($request->description),
                "post_link"              =>  $request->post_link,
            ]);
            if (request()->hasFile('post_photo'))
            {
                $path   = public_path('vetvineUsers/posts/');
                $result = vetvineHelper::saveImage($request->post_photo, $path);
                Post::find($id)->update([
                    "post_photo"    =>  $result
                ]);
            }
            else if(request()->hasFile('post_add_video')){
                $path   = public_path('vetvineUsers/videos/');
                $video  = vetvineHelper::saveImage($request->post_add_video, $path);
                Post::find($id)->update([
                    "post_add_video"   =>  $video,
                ]);
            }
            else
            {
                $user   = Auth::user()->id;
                Post::find($id)->update([
                    "forum_id"                   =>  $request->forum_id,
                    "user_id"                    =>  $user,
                    "post_title"                 =>  ucwords($request->post_title),
                    "post_description"           =>  ucfirst($request->description),
                    "post_link"                  =>  $request->post_link,
                ]);
            }
            parent::successMessage('Post Updated successfully.');
            return redirect(route('getForumPosts',$request->forum_id));
            // return redirect(route('forumpostlist',$request->forum_id));
        } catch(Exception $e) {
            parent::dangerMessage("Post Does Not Updated, Please Try  Again");
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
            Post::find($id)->delete();
            parent::successMessage('Post Deleted successfully.');
            return redirect()->back();
            // return redirect(route('forumsfrontend'));
        } catch(Exception $e) {
            parent::dangerMessage("Post Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
