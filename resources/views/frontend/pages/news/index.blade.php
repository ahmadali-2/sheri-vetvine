@extends('frontend.master')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('frontend/forums/css/style.css') }}" />
@endsection
@section('content')
<section class="main_banner_bottob_label"></section>

<section class="become_member_area">
    <div class="container">
        <h2>
            <span>News
            </span>
        </h2>
    </div>
</section>

<section>
    <div class="specialty-topics">
        <div class="container">
            <div class="specialty-info">
                <div class="search-feild float-right">
                    <input type="search" required>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="specialty-detail">
                    <h2>News Section</h2>
                </div>
                @foreach ($news as $new)
                <div class="topics-section">
                    <div class="behavior-card col-lg-6">
                        <div class="behavior-img"><img
                                src="{{ asset('frontend/forums/img/forum-pic-1.png') }}"
                                alt="behavior img"></div>
                        <div class="behavior-details ">
                            <div class="behavior-title">
                                <a href="{{$new->news_link}}"><h2>{{$new->news_title}}</h2></a>
                            </div>
                            <div class="behavior-description">
                                <p>{{$new->news_description}}</p>
                            </div>
                            <div class="behavior-description">
                                <div class="file">
                                    <img src="{{ asset('frontend/forums/img/forum-file-icon.png') }}"
                                        alt="">
                                    <p>105</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="behavior-card-right col-lg-6">
                        <div class="behavior-details-right ">
                            <p class="behavior-card-description">Published
                            </p>
                            <p class="date">March 3, 2021</p>
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
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
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
