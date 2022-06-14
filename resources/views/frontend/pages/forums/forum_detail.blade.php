@extends('frontend.master')
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('frontend/forums/css/style.css') }}" />
@endsection
@section('content')
    <main>
        <section class="main_banner  forum_bg">
            <div class="container">
                <div class="flex-box-banner">
                    <div class="grow_banner_box grow_banner_box_web">
                        <div class="grow-heading">Forum</div>
                        <img src="{{ asset('frontend/forums/img/sep-line-2.jpg') }}" width="250" height="2" alt=""
                            class="line_image">
                        <p class="mb-0">A BETTER LIFE FOR ANIMALS AND THE HUMANS
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
                <span>Post
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
                                <p class="mb-0 pl-2 pr-2">Admin</p>
                                <div class="comment_forum pl-1 "><img src="{{ asset('frontend/forums/img/crown.png') }}"
                                        alt=""></div>
                            </div>
                            <div class="date-icon d-flex align-items-center">
                                <div class="comment_forum">
                                    <span>{{ date('M d, Y', strtotime($forumcatgeorypost->created_at)) }}</span></div>
                                <div class="comment_forum pl-1 "><img src="{{ asset('frontend/forums/img/dots.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="chat-details">
                            <div class="chat-title">
                                <h3>{{ $forumcatgeorypost->post_title }}</h3>
                                <h6>{{ $forumcatgeorypost->forum->forum_title }}</h6>
                            </div>
                            <div class="chat-description">
                                <p class="">{!! $forumcatgeorypost->post_description !!} </p>
                            </div>
                            <div class="chat-like-comments">
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
                                    <div class="like-btn d-flex align-items-center">
                                        <img src=" {{ asset('frontend/forums/img/thumb-up.png') }}" alt="">
                                        <p class="mb-0 pl-2">Like</p>
                                    </div>

                                    <div class="like-btn d-flex align-items-center">
                                        <img src="{{ asset('frontend/forums/img/chat-box.png') }}" alt="">
                                        <p class="mb-0 pl-2">Comment</p>
                                        {{-- @include('frontend.pages.forums.replies', [
                                            'comments' => $forumcatgeorypost->comments,
                                            'post_id' => $forumcatgeorypost->id,
                                        ])
                                        <hr /> --}}
                                    </div>
                                    <div class="like-btn d-flex align-items-center">
                                        <img src="{{ asset('frontend/forums/img/curve-arrow.png') }}" alt="">
                                        <p class="mb-0 pl-2">Share</p>
                                    </div>


                                </div>

                            </div>
                            <form method="post" id="commentform" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="chat-textarea">
                                    <div class="cht-pro">
                                        <div class="comment_forum  pr-1"><img
                                                src="{{ asset('frontend/forums/img/user.png') }}" alt=""></div>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{ $forumcatgeorypost->id }}" />
                                    <textarea type="text" class="form-control" name="comment" id="comment" cols="30" rows="5"
                                        placeholder="write a comment ...."></textarea>
                                </div>

                                <div class="text-btn">
                                    {{-- <div class="btn-cancel"><a href="#">Cancel</a></div> --}}
                                    <button type="submit" class="btn btn-primary" id="comment_btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="chat-side col-lg-4 col-md-2  pl-0 pr-0">
                        <div class="chat-side-detail">
                            <div class="small_screen">
                                <div class="comment_forum  d-flex align-items-center"><img
                                        src="{{ asset('frontend/forums/img/view.png') }}" alt="">
                                    <div class="chat-veiw">16 views</div>
                                </div>
                                <div class="comment_forum  d-flex align-items-center"><img
                                        src="{{ asset('frontend/forums/img/message.png') }}" alt="">
                                    <div class="chat-veiw">0 comments</div>
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
            {{-- @empty
        <h3>Not Found</h3>
        @endforelse --}}

    </section>
    <section>
        <div class="container">
            <div class="advertising-sec">
                <a href="{{ $ads[0]->banner_image_url}}" target="_blank">
                    <div class="advertising-img-1"><img src="{{ asset('admin/advertisement/' . $ads[0]->ad_media) }}" alt=""></div>
                </a>
                <a href="{{ $ads[1]->banner_image_url}}" target="_blank">
                    <div class="advertising-img-1"><img src="{{ asset('admin/advertisement/' . $ads[1]->ad_media) }}" alt=""></div>
                </a>
                <a href="{{ $ads[2]->banner_image_url}}" target="_blank">
                    <div class="advertising-img-1"><img src="{{ asset('admin/advertisement/' . $ads[2]->ad_media) }}" alt=""></div>
                </a>
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
@endsection