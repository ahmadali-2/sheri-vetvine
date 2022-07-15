@extends('frontend.master')
@section('content')
    <style>
        * {
            box-sizing: border-box;
            font-family: "Museo 500";
        }

        /* Add a gray background color with some padding */


        /* Header/Blog Title */
        .header {
            padding: 30px;
            font-size: 40px;
            text-align: center;
            background: white;
        }

        /* Create two unequal columns that floats next to each other */
        /* Left column */
        .leftcolumn {
            float: left;
            width: 75%;
        }

        /* Right column */
        .rightcolumn {
            float: left;
            width: 25%;
            padding-left: 20px;
        }

        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }


        #ajax-book-model .form-control {
            border: 1px solid #ced4da !important;
        }

        #ajax-book-model .btn-primary {
            color: #fff;
            background-color: #f27222;
            border-color: #f27222;
        }

        #ajax-book-model h4 {
            padding-left: 15px;
        }

        .public-detail-inner h2 {
            font-size: 24px;
            letter-spacing: 1px;
            color: #5c7c85;
            font-family: "Museo 500";
            padding: 30px 0px 0px 0px;
            margin-bottom: 0 !important;
            font-family: 'Museo 500';
        }

        .leftcolumn h4 {
            padding-left: 1rem;
            margin-top: 10px;
            font-family: 'Museo 500';
        }

        #ajax-book-model .form-control {

            border: 1px solid #ced4da !important;
        }

        #ajax-book-model .btn-primary {
            color: #fff;
            background-color: #f27222;
            border-color: #f27222;
        }

        #ajax-book-model h4 {
            padding-left: 15px;
        }

        .public-detail-inner h2 {
            font-size: 24px;
            letter-spacing: 1px;
            color: #5c7c85;
            font-family: "Museo 500";
            padding: 30px 0px 0px 0px;
            margin-bottom: 0 !important;
            font-family: 'Museo 500';
        }

        .leftcolumn h4 {
            padding-left: 1rem;
            margin-top: 10px;
            font-family: 'Museo 500';
        }

        /* End */
    </style>

    <body>
        <section class="video-section-wrapper mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="breadcrumbs large-font">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" role="button" tabindex="0">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a onclick="history.back()" href="javascript::void();">Videos On Demand</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $videos->video_title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="video-detail-inner">
                    <div class="video-title-he d-flex flex-wrap justify-content-between ">
                        <h2>{{ $videos->video_title }}</h2>
                        {{-- <div class="" > --}}
                        <a href="#" class="vd-more-inf mt-0">More Info</a>
                        {{-- </div> --}}
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-10 mt-4  inner_box_chat">
                                <input type="hidden" name="event_id" value="{{ $videos->id }}">
                                <input type="hidden" name="user_id" value="{{ $videos->user_id }}">
                                {{-- <p class="font-weight-bold ">Review</p> --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 rating_box">
                                        <div class="rate d-flex ">
                                    @if (isset($rating->rating))
                                            @for ($i = 1; $i <= $rating->rating; $i++)
                                                <label for="star{{ $i }}" title="text">{{{ $i }}} stars</label>
                                                <input type="radio" id="star{{ $i }}" data-stars="{{ $i }}"class="rate"
                                                    name="rating" value="{{ $i }}" checked />
                                            @endfor
                                            @for ($j = 0; $j < 5 - $rating->rating; $j++)
                                                <input type="radio" checked id="star{{ $i  }}" data-stars="{{ $i }} "class="rate"
                                                    name="rating" value="{{ $i }}" />
                                                <label for="star{{ $i  }}" title="text">{{ $i  }} stars</label>
                                                <div class="d-none">{{ $i = $i+ 1 }}</div>
                                            @endfor
                                    @else
                                        <div class="rate">
                                            <input type="radio" id="star5" class="rate" data-stars="5"  name="rating"
                                                value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" checked id="star4"  data-stars="4" class="rate"
                                                name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" class="rate" data-stars="3"  name="rating"
                                                value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" class="rate"  data-stars="2" name="rating"
                                                value="2">
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" class="rate" data-stars="1"  name="rating"
                                                value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <div class="detail-vedio">
                        <iframe src="{{ $videos->video_link }}" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe>
                    </div>
                    <div class="video-detail-para border-0">
                        <p>
                            {{ $videos->video_description }}
                        </p>
                    </div>
                </div>
                <section class="video-section-wrapper border-top-0 mb-4">
                    <div class="container">
                        <div class="row w-100 m-0">
                            <div class="col-12">
                                <h1 class="Upcoming-webinars">You might also like</h1>
                            </div>
                            @forelse ($more_info as $item)
                                <div class="col-md-6 col-lg-4">
                                    <div class="video-box-main">
                                        <div class="video-box">
                                            <iframe src="{{ $item->video_link }}" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="video-bottom-text">
                                            <a style="color: #869799;" href="{{ route('video_desc', [$item->id, $item->category_id]) }}"  >
                                                {{ $item->video_title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </section>
            </div>
        </section>
        @section('scripts')
            <script>
                $(document).ready(function() {
                    $('input[name="rating"]').click(function() {
                        var length = $(this).attr('data-stars');
                        alert(length);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('rating.videos') }}",
                            type: "POST",
                            data: {
                                length: length,
                                video_id: $('input[name="event_id"]').val(),
                                user_id: $('input[name="user_id"]').val()
                            },
                            success: function(response) {
                            }
                        });
                    });
                });
                // });
            </script>
        @endsection
    @endsection
