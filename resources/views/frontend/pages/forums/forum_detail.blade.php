@extends('frontend.master')
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('frontend/forums/css/style.css') }}" />
@endsection
@section('content')
    <input id="liked_post_id" type="number" value="{{ $forumcatgeorypost->id }}" hidden>
    <input id="post_user_id" type="number" value="{{ $forumcatgeorypost->user->id }}" hidden>
    <main>
        <section class="main_banner  forum_bg">
            <div class="container">
                <div class="flex-box-banner">
                    <div class="grow_banner_box grow_banner_box_web">
                        <div class="grow-heading">Forum</div>
                        <img src="{{ asset('frontend/forums/img/sep-line-2.jpg') }}" width="250" height="2"
                            alt="" class="line_image">
                        <p class="mb-0">Guidance, support and wisdom to benefit and maximize the life and
                            longevity of animals.
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
                <span id="forum_post_detail">Post
                </span>
            </h2>
        </div>
    </section>




    <section>
        {{-- @forelse ($forumcatgeorypost as $item) --}}
        {{-- @dd($item) --}}
        <div class="container">
            <div class="forum-chat mt-5">
                <div class="chat-box-a col-lg-12 pl-0 pr-0 d-flex">
                    <div class="user-pro-detail col-lg-8 col-md-10 col-sm-12">
                        <div class="user-pro ">
                            <div class="left-pro d-flex">
                                <div class="comment_forum  pr-1"><img src="{{ asset('frontend/forums/img/user.png') }}"
                                        alt=""></div>
                                <p class="mb-0 pl-2 pr-2">{{ $forumcatgeorypost->user->name }}</p>
                                <div class="comment_forum pl-1 "><img src="{{ asset('frontend/forums/img/crown.png') }}"
                                        alt=""></div>
                            </div>
                            @auth
                            <div class="date-icon d-flex align-items-center">
                                <div class="comment_forum">
                                    <span>{{ date('M d, Y', strtotime($forumcatgeorypost->created_at)) }}</span>
                                </div>
                                <div class="comment_forum pl-1 "><img src="{{ asset('frontend/forums/img/dots.png') }}"
                                        alt="">
                                </div>
                            </div>
                            @endauth
                        </div>
                        <div class="chat-details">
                            <div class="chat-title">
                                <h3>{{ $forumcatgeorypost->post_title }}</h3>
                                <h6>{{ $forumcatgeorypost->forum->forum_title }}</h6>
                            </div>
                            <div class="chat-description">
                                <p class="">{!! $forumcatgeorypost->post_description !!} </p>
                            </div>
                            @if($userLoggedIn == 1)
                            <div class="chat-like-comments" id="chat-like-comments">
                                {{-- <div class="icons-like">
                                    <div class="comments-icon">
                                        <img src="img/like.png" alt="">
                                        <img src="img/heart2.png" class="heart1" alt="">
                                        <img src="img/heart1.png" class="heart1" alt="">

                                    </div>
                                    <div class="like-name">
                                        <p class="mb-0">jubli marld, Jut and 41 others</p>
                                    </div>
                                </div> --}}
                                <div class="icon-btn my-3">
                                    <a id="like_post" style="cursor: pointer;">
                                        <div class="like-btn d-flex align-items-center">
                                            <img src=" {{ asset('frontend/forums/img/thumb-up.png') }}" alt="">
                                            <p class="mb-0 pl-2" id="like_text">Like</p>
                                        </div>
                                    </a>
                                    <a id="comment_post" style="cursor: pointer;">
                                        <div class="like-btn d-flex align-items-center">
                                            <img src="{{ asset('frontend/forums/img/chat-box.png') }}" alt="">
                                            <p class="mb-0 pl-2">Comment</p>

                                        </div>
                                    </a>
                                    <a id="share_post" style="cursor: pointer;">
                                        <div class="like-btn d-flex align-items-center">
                                            <img src="{{ asset('frontend/forums/img/curve-arrow.png') }}" alt="">
                                            <p class="mb-0 pl-2">Share</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <form id="commentform">
                                @csrf
                                <div class="chat-textarea">
                                    <div class="cht-pro">
                                        <div class="comment_forum  pr-1"><img
                                                src="{{ asset('frontend/forums/img/user.png') }}" alt=""></div>
                                    </div>
                                    <input type="hidden" id="comment_post_id" name="post_id" value="{{ $forumcatgeorypost->id }}" />
                                    <textarea type="text" class="form-control" name="comment" id="comment" cols="30" rows="5"
                                        placeholder="write a comment ...."></textarea>
                                </div>

                                <div class="text-btn">
                                    <button type="button" class="btn btn-primary" id="comment_btn">Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="chat-side col-lg-4 col-md-2  pl-0 pr-0">
                        <div class="chat-side-detail">
                            <div class="small_screen">
                                <div class="comment_forum  d-flex align-items-center"><img
                                        src="{{ asset('frontend/forums/img/view.png') }}" alt="">
                                    <div class="chat-veiw">
                                        {{ str_pad($forumcatgeorypost->postView->count('view_count'), 2, '0', STR_PAD_LEFT) }}
                                        views</div>
                                </div>
                                <div class="comment_forum  d-flex align-items-center"><img
                                        src="{{ asset('frontend/forums/img/message.png') }}" alt="">
                                    <div class="chat-veiw" id="post_detail_comments">{{ $forumcatgeorypost->comments->count('comments') }} comments
                                    </div>
                                </div>
                            </div>
                            <div class="similar">
                                <h4>Similar Post</h4>
                                @foreach ($relatedposts as $relatedpost)
                                    <a href="{{ $relatedpost->id }}">
                                        {{ $relatedpost->post_title }}
                                    </a>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="postCommentReplies" id="postCommentReplies">
                            @include('frontend.pages.forums.replies', [
                                'comments' => $forumcatgeorypost->comments,
                                'post_id' => $forumcatgeorypost->id,
                                'ce' => 0,
                                'type' => 'post',
                            ])
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
            @endif
    </section>
    <section>
        <div class="container">
            <div class="advertising-sec">
                @if (count($ads) > 0)
                    <a href="{{ $ads[0]->banner_image_url }}" target="_blank">
                        <div class="advertising-img-1">
                            @if (isset($ads[0]))
                                <img src="{{ asset('admin/advertisement/' . $ads[0]->ad_media) }}" alt="">
                            @else
                                <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                            @endif
                        </div>
                    </a>
                @else
                    <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                @endif
                @if (count($ads) > 0)
                    <a href="{{ $ads[0]->banner_image_url }}" target="_blank">
                        <div class="advertising-img-1">
                            @if (count($ads) > 0)
                                @if (isset($ads[1]))
                                    <img src="{{ asset('admin/advertisement/' . $ads[1]->ad_media) }}" alt="">
                                @else
                                    <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                                @endif
                            @else
                                <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                            @endif
                        </div>
                    </a>
                @else
                    <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                @endif
                @if (count($ads) > 0)
                    <a href="{{ $ads[2]->banner_image_url }}" target="_blank">
                        <div class="advertising-img-1">
                            @if (isset($ads[2]))
                                <img src="{{ asset('admin/advertisement/' . $ads[2]->ad_media) }}" alt="">
                            @else
                                <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                            @endif
                        </div>
                    </a>
                @else
                    <img src="{{ asset('admin/advertisement/defaultAd.png') }}" alt="">
                @endif
            </div>
        </div>
    </section>
    {{-- <div class="container">
        <div class="advertising-sec">
            <div class="advertising-img-1"><img src="{{ asset('frontend/forums/img/add-1.png') }}" alt=""></div>
            <div class="advertising-img-2"><img src="{{ asset('frontend/forums/img/add-2.png') }}" alt=""></div>
            <div class="advertising-img-3"><img src="{{ asset('frontend/forums/img/add-3.png') }}" alt=""></div>
        </div>
    </div> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        activateFormEvents();
        $(document).ready(function () {
        // Handler for .ready() called.
        $('html, body').animate({
            scrollTop: $('#forum_post_detail').offset().top
        }, 'slow');
    });
        $('#comment_btn').on('click', function(){
            var form = $('#commentform').serialize()+'&type=post&ce=0';
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "POST",
            url: '/comment/store',
            data: form,
            success: function(response){
                if(response.code == 200){
                    refreshComments();
                    activateFormEvents();
                    toastr.success(response.message);
                }
            }
            });
        });

        function refreshComments(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/show-comments',
                data: {post_id: $('#comment_post_id').val(), type: 'post', ce:0},
                success: function(response){
                    $('#postCommentReplies').empty();
                    $('#postCommentReplies').append(response.html);
                    $('#post_detail_comments').empty();
                    $('#post_detail_comments').html(response.count+' comments');
                    activateFormEvents();
                }
                });
        }

    if ('<?php echo $liked; ?>' == true) {
        $('#like_post').css('color', '#4886C8');
        $('#like_text').html('<b>Liked</b>');
    }

    $('#like_post').on('click', function() {
        likePost();
    });

    var likepostid = $('#liked_post_id').val();
    var postUserid = $('#post_user_id').val();

    function likePost() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "POST",
            url: '/savelike',
            data: {
                likepostid: likepostid,
                postUserid: postUserid,
                likeType: 1,
                ce: 0
            },
            success: function(response) {
                console.log(response.code);
                if (response.code == 200) {
                    $('#like_post').css('color', '#4886C8');
                    $('#like_text').html('<b>Liked</b>');
                } else if (response.code == 201) {
                    $('#like_post').css('color', 'black');
                    $('#like_text').html('Like');
                } else if (response.code == 400) {
                    toastr.error(response.message);
                }
            }
        });
    }

    $('#share_post').on("click", function() {
        sharePostId = $(this).attr('data-post-id');
        shareUserid = $(this).attr('data-user-id');
        sharePost();
    });

    function sharePost() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "POST",
            url: '/share-post',
            data: {
                sharePostId: likepostid,
                shareUserId: postUserid,
                ce: 0,
            },
            success: function(response) {
                if (response.code == 200) {
                    toastr.success('Post shared Successfully!');
                } else if (response.code == 400) {
                    toastr.error('Please login to continue!');
                } else if (response.code == 401) {
                    toastr.error('Please verify email first!');
                } else if (response.code == 402) {
                    toastr.error(response.message);
                }
            }
        });
    }

    function activateFormEvents(){
        $('.postCommentReplies button').on('click', function(){
        var formKey = '#replyfrm_'+$(this).attr('data-key');
        var formData = $(formKey).serialize()+'&type='+"post"+'&ce=0';
        console.log(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "POST",
            url: "{{route('reply.add')}}",
            data: formData,
            success: function(response){
                if(response.code == 200){
                    refreshComments();
                    activateFormEvents();
                    toastr.success(response.message);
                }
                if(response.code == 400){
                    toastr.error(response.message);
                }
            },
            error: function(response){
                toastr.error('Please login to proceed!');
            }
        });
    });

    $('.postCommentReplies a').on('click', function(){
        var commentId = $(this).attr('data-comment-id');
        var deleteUrl = '{{ route("comment.destroy", ":id") }}';
        deleteUrl = deleteUrl.replace(':id', commentId);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "post",
                url:deleteUrl,
                success: function(response){
                    if(response.code == 200){
                        refreshComments();
                        activateFormEvents();
                        Swal.fire(
                        'Deleted!',
                        'Your comment has been deleted.',
                        'success'
                        )
                    }
                    if(response.code == 400){
                        toastr.error(response.message);
                    }
                },
                error: function(response){
                    toastr.error('Please login to proceed!');
                }
            });
            }
        });
    });
    }
</script>
@endsection
