<?php

namespace App\Http\Controllers\VetvineUsers\PostManagement;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Admins\Forum\Like;
use App\Models\Admins\Forum\Post;
use App\Models\Admins\News\News;
use App\Models\MemberPermission;
use App\Models\PostActivity;
use App\Models\PushNotification;
use App\Models\Share;
use App\Models\ShareLike;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use vetvineHelper;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('vetvineUsers.post.index', compact('posts'));
    }

    public function memberHome()
    {
        $user = auth()->user();
        if($user){
            $permissions = MemberPermission::where('membertype_id', $user->userMemberType->id)->first();
            $likesPermission = $permissions->likes;
            $commentsPermission = $permissions->comments;
            $sharesPermission = $permissions->shares;
            $posts = array();

            $news = News::all();

            $postActivities = PostActivity::orderBy('id','desc')->paginate(3);

            foreach($postActivities as $postActivity){
                if(isset($postActivity->post_id)){
                    $post = Post::with('user', 'likes')->where('id', $postActivity->post_id)->first();
                    array_push($posts, $post);
                }else{
                    $share = Share::with('users', 'posts', 'likes')->where('id', $postActivity->share_id)->first();
                    array_push($posts, $share);
                }
            }
        }

        return view('frontend.pages.member-home', compact('posts', 'news', 'postActivities','likesPermission','commentsPermission','sharesPermission'));
    }

    public function paginateMemberHomePost(){
        $posts = array();
        $postActivities = PostActivity::orderBy('id','desc')->paginate(3);

        $user = auth()->user();
        if($user){
            $permissions = MemberPermission::where('membertype_id', $user->userMemberType->id)->first();
            $likesPermission = $permissions->likes;
            $commentsPermission = $permissions->comments;
            $sharesPermission = $permissions->shares;

            foreach($postActivities as $postActivity){
                if(isset($postActivity->post_id)){
                    $post = Post::with('user', 'likes')->where('id', $postActivity->post_id)->first();
                    array_push($posts, $post);
                }else{
                    $share = Share::with('users', 'posts', 'likes')->where('id', $postActivity->share_id)->first();
                    array_push($posts, $share);
                }
            }

        }

        return response()->json([
            'html' =>  view('frontend.pages.member-home-posts', compact('posts', 'postActivities', 'likesPermission', 'commentsPermission', 'sharesPermission'))->render(),
            'code' => 200,
        ]);
    }

    public function sharePost(Request $request){
        $user = auth()->user();
        if($user){
            $permissions = MemberPermission::where('membertype_id', $user->userMemberType->id)->first();
            if($permissions->shares == 1){
            if(isset(auth()->user()->email_verified_at)){

                $share = new Share();
                $share->user_id = auth()->user()->id;
                $share->post_id = $request->sharePostId;
                $share->ce = $request->ce;
                $share->save();

                PostActivity::create([
                    'share_id' => $share->id,
                ]);

                return response()->json([
                    'code' => 200,
                    'message' => 'Post shared successfully!',
                ]);
            }else{
                return response()->json([
                    'code' => 401,
                    'message' => 'Please verify your email to continue!',
                ]);
            }
        }else{
            return response()->json([
                'code' => 402,
                'message' => 'You dont have permission to share!',
            ]);
        }
    }else{
        return response()->json([
            'code' => 400,
            'message' => 'Please login first to continue!',
        ]);
    }
    }

    public function likeSave(Request $request)
    {
        $user = auth()->user();
        if($user){
            $permissions = MemberPermission::where('membertype_id', $user->userMemberType->id)->first();
            if($permissions->likes == 1){
                if($request->likeType == 1){
                    $liked = Like::where('user_id', Auth::id())->where('post_id', $request->likepostid)->where('ce',$request->ce)->first();
                }else{
                    $liked = ShareLike::where('user_id', Auth::id())->where('share_id', $request->likepostid)->where('ce',$request->ce)->first();
                }
                if (!$liked) {
                    $push_notifications = event(new NotificationEvent(Auth::id(), (int) $request->likepostid));
                    PushNotification::create([
                        'user_id' => Auth::id(),
                        'post_id' => $request->likepostid,
                        'post_user_id' => $request->postUserid,
                        'type' => '0',
                    ]);

                    if($request->likeType == 1){
                        $liked = Like::create([
                            "post_id" => $request->likepostid,
                            "user_id" => Auth::id(),
                            "like" => 1,
                            "ce" => $request->ce,
                        ]);
                    }else{
                        $liked = ShareLike::create([
                            "share_id" => $request->likepostid,
                            "user_id" => Auth::id(),
                            "like" => 1,
                            "ce" => $request->ce,
                        ]);
                    }

                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'Data inserted successfully',
                            'code' => 200,
                            'like' => $liked,
                        ]
                    );

                } elseif ($liked->like == 0) {

                    $liked->update([
                        "like" => '1',
                    ]);
                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'Post liked successfully!',
                            'code' => 200,
                            'like' => $liked,
                        ]
                    );
                } else {
                    $push_notifications = event(new NotificationEvent(Auth::id(), (int) $request->likepostid));
                    PushNotification::create([
                        'user_id' => Auth::id(),
                        'post_id' => $request->likepostid,
                        'post_user_id' => $request->postUserid,
                        'type' => '0',
                    ]);
                    $liked->update([
                        "like" => '0',
                    ]);
                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'Post unliked successfully',
                            'code' => 201,
                            'like' => $liked,
                        ]
                    );
                }
            }else{
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'You dont have permission to like!',
                        'code' => 400,
                    ]
                );
            }
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Please login to like!',
                    'code' => 400,
                ]
            );
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vetvineUsers.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $path = public_path('vetvineUsers/posts/');
        $result = vetvineHelper::saveImage($request->post_photo, $path);
        $path = public_path('vetvineUsers/videos/');
        $video = vetvineHelper::saveImage($request->post_add_video, $path);
        $input = $request->all();
        try {
            $post = new Post();
            $post->post_title = $request->post_title;
            $post->post_photo = $result;
            $post->user_id = $user;
            $post->post_description = $request->description;
            $post->post_link = $request->post_link;
            $post->post_add_video = $video;
            $post->save();

            PostActivity::create([
                'post_id' => $post->id,
            ]);

            parent::successMessage('Post saved successfully.');
            return redirect(route('post.index'));
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
        $post = Post::find($id);
        return view('vetvineUsers.post.edit', compact('post'));
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
            $user = Auth::user()->id;
            $post = Post::find($id);
            $path = public_path('vetvineUsers/posts/');
            $result = vetvineHelper::updateImage($request->post_photo, $post->post_photo, $path);
            $path = public_path('vetvineUsers/videos/');
            $video = vetvineHelper::saveImage($request->post_add_video, $path);
            $post->update([
                'post_title' => $request->input('post_title'),
                'post_photo' => $result,
                "user_id" => $user,
                'post_description' => $request->input('description'),
                'post_link' => $request->input('post_link'),
                'post_add_video' => $video,
            ]);
            parent::successMessage('Post updated successfully.');
            return redirect(route('post.index'));
        } catch (Exception $e) {
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
        try {
            $post = Post::find($id);
            $post->delete();
            parent::successMessage('Post deleted successfully.');
            return redirect()->route('post.index');
        } catch (Exception $e) {
            parent::dangerMessage("Post Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
