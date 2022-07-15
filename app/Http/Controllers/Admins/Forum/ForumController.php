<?php

namespace App\Http\Controllers\Admins\Forum;

use App\Http\Controllers\Controller;
use App\Models\Admins\Forum\CategoryForum;
use App\Models\Admins\Advertisement\Ad;
use App\Models\Admins\Forum\Forum;
use App\Models\Admins\Forum\Like;
use App\Models\Admins\Forum\Post;
use App\Models\Admins\Forum\PostView;
use App\Models\Generals\Member;
use App\Models\Likes;
use App\Models\UserMemberAndNetworkLevel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories   =   CategoryForum::all();
        $forums       =   Forum::with('category')->get();
        return view('admins.forums.index',compact('categories','forums'));
    }

    public function getForums($categoryId){

        $forums = Forum::with('category','posts','likecount')->where('category_id',$categoryId)->get();
        $categories   =   CategoryForum::all();
        return view('frontend.pages.forums.forum',compact('forums','categories','categoryId'));

    }

    public function searchFormCategory(Request $request){
        $categories = null;
        if($request->category > 0 && isset($request->category_title_text)){
            $categories = CategoryForum::where('id',$request->category) ->where('category_title', 'LIKE', '%' . $request->category_title_text . '%')->get();
        }elseif($request->category > 0){
            $categories = CategoryForum::where('id',$request->category)->get();
        }
        elseif($request->category == 0 && isset($request->category_title_text)){
            $categories = CategoryForum::where('category_title', 'LIKE', '%' . $request->category_title_text . '%')->get();
        }
        elseif(isset($request->category_title_text) == false){
            $categories = CategoryForum::get();
        }
        return response()->json([
            'html' => view('frontend.pages.forums.form_category_data',compact('categories'))->render(),
        ]);
    }

    public function searchCategoryForm(Request $request){
        $forums = null;
        if($request->category > 0 && isset($request->title_text)){
            $forums = Forum::with('category')->where('category_id',$request->category)->where('forum_title', 'LIKE', '%' . $request->title_text . '%')->get();
        }elseif($request->category > 0){
            $forums = Forum::with('category')->where('category_id',$request->category)->get();
        }
        elseif($request->category == 0 && isset($request->title_text)){
            $forums= Forum::with('category')->where('category_id',$request->originalCategoryId)->where('forum_title', 'LIKE', '%' . $request->title_text . '%')->get();
        }
        elseif(isset($request->title_text) == false){
            $category_id = $request->category;
            if($category_id == 0){
                $category_id = $request->originalCategoryId;
            }
            $forums = Forum::with('category')->where('category_id',$category_id)->get();
        }
        return response()->json([
            'html' => view('frontend.pages.forums.category_wise_form',compact('forums'))->render(),
            'count' => count($forums),
        ]);
    }

    public function searchFormPosts(Request $request){
        $posts = null;
        if($request->form > 0 && isset($request->title_text)){
            $posts = Post::with('user')->where('forum_id',$request->form)->where('post_title', 'LIKE', '%' . $request->title_text . '%')->where('post_description', 'LIKE', '%' . $request->title_text . '%')->get();
        }elseif($request->form > 0){
            $posts = Post::with('user')->where('forum_id',$request->form)->get();
        }
        elseif($request->form == 0 && isset($request->title_text)){
            $posts = Post::with('user')->where('forum_id',$request->originalFormId)->where('post_title', 'LIKE', '%' . $request->title_text . '%')->where('post_description', 'LIKE', '%' . $request->title_text . '%')->get();
        }
        elseif(isset($request->title_text) == false){
            $form_id = $request->form;
            if($form_id == 0){
                $form_id = $request->originalFormId;
            }
            $posts = Post::with('user')->where('forum_id',$form_id)->get();
        }

        return response()->json([
            'html' => view('frontend.pages.forums.form_posts_view',compact('posts'))->render(),
            'count' => count($posts),
        ]);
    }

    public function getForumPosts($forumId){

        $userLoggedIn = false;
        $posts = Post::with('user','likes','comments','postView')->where('forum_id',$forumId)->get();
        $forums = Forum::with('category')->get();
        return view('frontend.pages.forums.forumscategory_post',compact('posts','forums','forumId'));

    }
    public function getForumcategoryPosts($forumcategorypostId){


        $categories   =   CategoryForum::all();
        $ads          =   Ad::all();
        $forums       =   Forum::all();
        $userLoggedIn = 0;
        if(auth()->user()){
            $userLoggedIn = 1;
        }
        $forumcatgeorypost = Post::with('forum','comments','user','postView','likes')->where('id',$forumcategorypostId)->first();
        $liked = false;
        $like = null;
        if((auth()->user())){
            $like = Like::where('post_id', $forumcatgeorypost->id)->where('ce',0)->where('like',1)->where('user_id', auth()->user()->id)->first();
        }
        if(isset($like)){
            $liked = true;
        }
        $relatedposts=Post::where('forum_id',$forumcatgeorypost->forum_id)->where('id', "!=" ,$forumcatgeorypost->id)->get();
        $this->createViewLog($forumcatgeorypost);

        return view('frontend.pages.forums.forum_detail',compact('forumcatgeorypost','relatedposts','categories','forums','ads','liked','userLoggedIn'));

    }
    public function createViewLog($forumcatgeorypost) {
        if(auth()->user()){
            $checkView =PostView::where('user_id',$forumcatgeorypost->user_id)->where('post_id', $forumcatgeorypost->id)->first();
            if($checkView == null){
                $postViews= new PostView();
                $postViews->post_id = $forumcatgeorypost->id;
                $postViews->user_id = $forumcatgeorypost->user_id;
                $postViews->view_count = 1;
                $postViews->ip_address = request()->ip();
                $postViews->agent = request()->header('User-Agent');
                $postViews->save();
            }
        }
    }
    public function frontendIndex()
    {
        $categories   =   CategoryForum::with('forums')->get();
        $ads          =   Ad::all();
        $forums       =   Forum::all();
        return view('frontend.pages.forums.index',compact('categories','forums','ads'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =   CategoryForum::all();
        $members    =   UserMemberAndNetworkLevel::all();
        return view('admins.forums.create',compact('categories','members'));
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
               $forum = Forum::create([
                "category_id"           => $input['category_id'],
                "forum_title"           => ucwords($input['forum_title']),
                "forum_description"     => ucfirst($input['forum_description']),
            ]);
            if($forum->wasRecentlyCreated)
            {
                foreach($input['member_id'] as $member)
                {
                    Member::create([
                    "memberable_id"   =>  $forum->id,
                    "memberable_type" => 'App\Models\Admins\Forum\Forum',
                    'member_id'       => $member,
                    ]);
                }
            }
            parent::successMessage('Forum saved successfully.');
            return redirect(route('forums.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Forum Does Not Created, Please Try  Again");
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
            $categories         =   CategoryForum::all();
            $members            =   UserMemberAndNetworkLevel::all();
            $forum              =   Forum::find($id);
            $selectedMembers    =   $forum->members->pluck('member_id')->toArray();
            return view('admins.forums.edit',compact('categories','members','forum','selectedMembers'));
        } catch(Exception $e) {
            parent::dangerMessage("Forum Does Not Created, Please Try  Again");
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

        $input = $request->all();
        $forum = Forum::find($id);
        try{
               $forum->update([
                "category_id"           => $input['category_id'],
                "forum_title"           => ucwords($input['forum_title']),
                "forum_description"     => ucfirst($input['forum_description']),
            ]);
            $selectedMembers    =   $forum->members->pluck('id')->toArray();
            Member::whereIn('id',$selectedMembers)->delete();
            foreach($input['member_id'] as $member)
            {
                Member::create([
                    "memberable_id"   =>  $forum->id,
                    "memberable_type" => 'App\Models\Admins\Forum\Forum',
                    'member_id'       => $member,
                ]);
            }
            parent::successMessage('Forum updated successfully.');
            return redirect(route('forums.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Forum Does Not Updated, Please Try  Again");
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
            Forum::find($id)->delete();
            parent::successMessage('Forum Deleted successfully.');
            return redirect(route('forums.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Forum Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }

}
