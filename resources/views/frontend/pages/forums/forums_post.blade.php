@extends('frontend.master')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('frontend/forums/css/style.css') }}" />
@endsection
@section('content')
<section class="main_banner_bottob_label"></section>
<section class="become_member_area">
    <div class="container">
        <h2>
            <span>Post
            </span>
        </h2>
    </div>
</section>
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class="btn btn-primary " href="{{ route('createforumpost',$forum->id ) }}">
                        Create Post
                </a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="specialty-topics">
        <div class="container">
            <div class="specialty-info">
                @foreach($posts as $post)
                <div class="topics-section">
                    <div class="behavior-card col-lg-6">
                        <div class="behavior-img"><img
                                src="{{ asset('frontend/forums/img/forum-pic-1.png') }}"
                                alt="behavior img"></div>
                                <a href="{{ route('forums-posts.show',$post->id) }}">
                                    <div class="behavior-details ">
                                        <div class="behavior-title">
                                            <h2>{{$post->post_title}}</h2>
                                        </div>

                                    </div>
                                </a>
                    </div>
                    <div class="behavior-card-right col-lg-6">
                        <div class="behavior-img-2"><img
                                src="{{ asset('frontend/forums/img/forum-pic-2.png') }}"
                                alt="behavior img"></div>
                        <div class="behavior-details-right ">
                            <p class="behavior-card-description">Last reply by VetVine CE in Child-Dog Safety Resources
                            </p>
                            <p class="date">{{$post->created_at->format('d M Y')}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            <div class="page-num col-lg-7">
                <ul>
                    <li><a href="#">previous</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="advertising-sec">
            <div class="advertising-img-1"><img src="{{ asset('frontend/forums/img/add-1.png') }}" alt=""></div>
            <div class="advertising-img-2"><img src="{{ asset('frontend/forums/img/add-2.png') }}" alt=""></div>
            <div class="advertising-img-3"><img src="{{ asset('frontend/forums/img/add-3.png') }}" alt=""></div>
        </div>
    </div>
</section>
@endsection
