<style>
    .pagination {justify-content: center;}
</style>
<?php
    $displayLike = false;
?>
@forelse($posts as $key=>$post)
    @if($post->getTable() == "shares")
        <?php $share = $post ?>
        <input id="member_home_post_id_{{$key}}" data-key={{$key}} type="number" value="{{$share->post_id}}" hidden>
        <input id="member_home_user_id_{{$key}}" data-key={{$key}} type="number" value="{{$share->user_id}}" hidden>
        <div class="post_center_box" data-key={{$key}}>
            <div class="row">
                <div class=" col-lg-6">
                    <img src="@if ($post->users[0]->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/' . $post->users[0]->profile_photo) }} @else {{ asset('frontend/images/user.png') }} @endif"
                        class="post_box_small_img" width="262" height="198" alt="" />
                    <div class="pull-left box_center_small_label">
                        @foreach($share->users as $user)
                            @if($user->id == $share->user_id)
                                @if($share->ce == 1)
                                    <label>{{ $user->name }} shared a new
                                    Continuing Education item:</label>
                                @else
                                    <label>{{ $user->name }} shared forum
                                    Continuing Education item:</label>
                                @endif
                            @endif
                        @endforeach
                        <p>{{$share->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class=" col-lg-6">
                @foreach($share->posts as $post)
                    @if($post->id == $share->post_id)
                    <div class="pull-left">
                        <label class="post_right_box_heading">{{ $post->post_title }}</label>
                        <h6 class="h6_post_label">
                            {!! $post->post_description !!}
                        </h6>
                        <p>Shared on : {{date("d-m-Y", strtotime($share->created_at))}}</p>
                    </div>
                    @endif
                @endforeach

                </div>
            </div>


            <div class="col-sm-12 text-center post_share_button  d-flex justify-content-center">
                <div class="shareLikeButtons">
                    @foreach($share->likes as $like)
                        @if(($like->share_id == $share->id) && ($like->ce == 1) && ($like->like == 1) && ($like->user_id == auth()->user()->id))
                            <?php $displayLike = true ?>
                        <a class="liked" member_home_post_id="{{$share->id}}" member_home_user_id="{{$share->user_id}}" member_home_like_type="0" style="cursor: pointer;"><b class="liked"> <i class='fa fa-thumbs-up'></i> Liked</b></a>
                        @endif
                    @endforeach
                    @if($displayLike == false)
                    <a class="like_color" member_home_post_id="{{$share->id}}" member_home_user_id="{{$share->user_id}}" member_home_like_type="0"> <i class='fa fa-thumbs-up'></i> Like</a>
                    @endif
                    <?php $displayLike = false ?>
                </div>
                <div class="shareCommentButtons">
                    <a style="cursor: pointer;" data-key={{$key}}><img src="{{ asset('frontend/img/comment-label.png') }}" alt="" /></a>
                </div>
                <div class="shareButtons">
                    <a class="share_btn" style="cursor: pointer;" data-user-id="{{$share->user_id}}" data-post-id="{{$share->post_id}}"> <i class="fa fa-share" aria-hidden="true"></i>
                        Share</a>
                </div>
            </div>
        </div>
        <div id="comment_{{$key}}" class="post_center_box" data-key={{$key}} style="display: none;">
            <textarea name="comment" id="comment_{{$key}}" placeholder="Enter comment here" rows="1" style="outline: none; width: 100%;"></textarea>
        </div>
    @else
        <input id="member_home_post_id_{{$key}}" data-key={{$key}} type="number" value="{{$post->id}}" hidden>
        <input id="member_home_user_id_{{$key}}" data-key={{$key}} type="number" value="{{$post->user->id}}" hidden>
        <div class="post_center_box">
            <div class="row">
                <div class=" col-lg-6">
                    <img src="@if ($post->user->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/' . $post->user->profile_photo) }} @else {{ asset('frontend/images/user.png') }} @endif"
                        class="post_box_small_img" width="262" height="198" alt="" />
                    <div class="pull-left box_center_small_label">
                        <label>{{ $post->user->name }} posted a new
                            Continuing Education item:</label>

                        <p>{{$post->created_at->diffForHumans()}}</p>
                    </div>



                </div>
                <div class=" col-lg-6">

                    <div class="pull-left">
                        <label class="post_right_box_heading">{{ $post->post_title }}</label>
                        <h6 class="h6_post_label">
                            {!! $post->post_description !!}
                        </h6>
                        <p>Posted on : {{date("d-m-Y", strtotime($post->created_at))}}</p>
                    </div>



                </div>


            </div>

            <div class="col-sm-12 text-center post_share_button d-flex justify-content-center like_section_parent">
                <div class="likeButtons">
                    @foreach($post->likes as $like)
                        @if(($like->post_id == $post->id) && ($like->ce == 1) && ($like->like == 1)  && ($like->user_id == auth()->user()->id))
                            <?php $displayLike = true ?>
                        <a  class="liked" member_home_post_id="{{$post->id}}" member_home_user_id="{{$post->user->id}}" member_home_like_type="1" style="cursor: pointer;"><b class="liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Liked</b></a>
                        @endif
                    @endforeach
                    @if($displayLike == false)
                    <a class="like_color" member_home_post_id="{{$post->id}}" member_home_user_id="{{$post->user->id}}" member_home_like_type="1"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like</a>
                    @endif
                    <?php $displayLike = false ?>
                </div>
                <div class="commentButtons">
                    <a style="cursor: pointer;"><img src="{{ asset('frontend/img/comment-label.png') }}" alt="" /></a>
                </div>
                <div class="shareButtons">
                    <a class="share_btn" style="cursor: pointer;" data-user-id="{{$post->user->id}}" data-post-id="{{$post->id}}"> <i class="fa fa-share" aria-hidden="true"></i>
                        Share</a>
                </div>

            </div>


        </div>
    @endif
    @empty
    <img src="{{ url('frontend/images/no-result.gif') }}" style="width: 100%;"/>
@endforelse
<div class="pagination_div">
    {{ $postActivities->links() }}
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            var likepostid;
            var postUserid;
            var sharePostId;
            var shareUserId
            var likeType;
            var commentPostId;

            $('.likeButtons a').on("click", function() {
                likepostid = $(this).attr('member_home_post_id');
                postUserid = $(this).attr('member_home_user_id');
                likeType = $(this).attr('member_home_like_type');
                likePost($(this));
            });

            $('.shareLikeButtons a').on("click", function() {
                likepostid = $(this).attr('member_home_post_id');
                postUserid = $(this).attr('member_home_user_id');
                likeType = $(this).attr('member_home_like_type');
                likePost($(this));
            });

            $('.shareButtons a').on("click", function() {
                sharePostId = $(this).attr('data-post-id');
                sharePost();
            });

            $('.shareCommentButtons a').on("click", function() {
                var commentId = '#comment_'+$(this).attr('data-key');
                if($(commentId).is(":visible")){
                    $(commentId).hide();
                }
                else{
                    $(commentId).show();
                }
                // commentPostId = $(this).attr('data-post-id');
                // displayCommentSection();
            });

        function displayCommentSection(){

        }

        function sharePost(){
            console.log(sharePostId, shareUserId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/share-post',
                data: {sharePostId: sharePostId, ce:1},
                success: function(response){
                    if(response.code == 200){
                        window.location.reload();
                        toastr.success('Post shared Successfully!');
                    }
                    else if(response.code == 400){
                        toastr.error('Please login to continue!');
                    }
                    else if(response.code == 401){
                        toastr.error('Please verify email first!');
                    }
                    else if(response.code == 402){
                        toastr.error(response.message);
                    }
                }
                });
        }
        function likePost(component){
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/savelike',
                data: {likepostid: likepostid, postUserid: postUserid, likeType: likeType, ce:1},
                success: function(response){
                    if(response.code == 200){

                        component.html("<b class='liked'> <i class='fa fa-thumbs-up'></i> Liked</b>");
                    }
                    else if(response.code == 201){

                        component.html("<b class='like_color'> <i class='fa fa-thumbs-up'></i> Like</b>");
                    }
                    else if(response.code == 400){

                        component.html("<b class='like_color'> <i class='fa fa-thumbs-up'></i> Like</b>");
                        toastr.error(response.message);
                    }
                }
                });
            }
    </script>





{{-- member home backup code  --}}
{{-- @extends('frontend.master')
@section('content') --}}
@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
    <!-- member home start -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/member-home-new-css.css') }}" /> --}}
    <section class="main_banner post_bg">
        <div class="container">
            <div class="flex-box-banner">
                <div class="grow_banner_box grow_banner_box_web">
                    <div class="grow-heading">MEMBERS</div>
                    <img src="{{ asset('frontend/img/sep-line-2.jpg') }}" width="250" height="2" alt=""
                        class="line_image">
                    <p class="mb-0">A BETTER LIFE FOR ANIMALS
                        AND THE HUMANS
                    </p>

                </div>
            </div>
        </div>
    </section>
    </main>
    <section class="main_banner_bottob_label"></section>

    <section class="become_member_area">
        <div class="container">
            <h2>
                <span>What's Buzzing
                </span>
            </h2>
        </div>
    </section>

    <section>
        <div class="specialty-topics margin_bottom_special">
            <div class="container">
                <div class="specialty-info">
                    <div class="specialty-detail">

                        <div class="search-feild float-left">
                            <input type="search" required>
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class=" col-lg-3 col-md-3 text-center">
                            <div class="img_post_left"><img src="@if(Auth()->user()->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/'.Auth()->user()->profile_photo)}} @else {{asset('frontend/images/thumbnail.jfif')}} @endif" width="262"
                                    height="198" alt="" />
                                <label>{{ Auth::user()->name }}</label>
                            </div>
                            <img src="{{ asset('frontend/img/add-img.png') }}" width="100%" class="add_left_post"
                                alt="" />
                        </div>
                        <div class="col-lg-6 col-md-6">
                        <div id="all_posts">
                            @include('frontend.pages.member-home-posts')
                        </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <img src="{{ asset('frontend/img/add-img.png') }}" width="100%" alt="" />
                        </div>
                    </div>
                </div>

            </div>

    </section>
    @section('scripts')
    <script>
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_posts(page);
        });

        function fetch_posts(page)

        {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url:"/member-home-paginate?page="+page,
            type: "GET",
            success:function(response)
            {
                if(response.code == 200){
                    $('#all_posts').empty();
                    $('#all_posts').append(response.html);
                }
            }
            });
        }
    </script>
    @endsection
@endsection

