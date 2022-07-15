@extends('frontend.master')
@section('content')
    <main>
        <section class="video-section-wrapper mb-4">
            <div class="container">

                <h1 class="Upcoming-webinars mt-2">Videos on Demand</h1>
                {{-- <input type="text"> --}}
                {{ $avg }}
                <ul class="filter_list upcoming_filter">


                    <li class="top-three-input first_li">
                        <label>Search By :</label>
                        {{-- <input type="text" class=" form-control" name="name"> --}}
                    </li>

                    <li class="top-three-input">
                        <label>Title / Keyword</label>
                        <input type="text" class=" form-control title " name="title" id="title">
                    </li>
                    <li>
                        <div id="fav_show_wrapper mt-0">
                            <label for="category" id="category">Category:</label>
                            <select name="category" id="category_id" class="filter-slect category ">
                                <option value="" selected disabled>Select Category</option>
                                @forelse ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_title }}</option>
                                @empty
                                    <h5>No Category</h5>
                                @endforelse
                            </select>
                        </div>
                    </li>
                    <li class="top-three-input">
                        <label> Presenter </label>
                        <input type="text" class=" form-control presenter" name="presenter" id="presenter">
                    </li>
                    <li class="last_li">
                        <label>Sponsor</label>
                        <div class="form-group">
                            <select name="sponser_id" id="sponser_id" class="form-control filter-slect  sponser_id ">
                                <option value="" selected disabled>Select Sponsor</option>
                                @forelse ($sponsor as $item)
                                    <option value="{{ $item->id }}">{{ $item->sponser_name }}</option>
                                @empty
                                    <h5>No Data found1</h5>
                                @endforelse
                            </select>
                        </div>
                    </li>
                    <li>
                        <button class="btn filter-searchBtn search_btn_hover" id="search" type="button" style="margin-top: 10px;">Search</button>
                    </li>
                </ul>
                <ul class="page-link-list">
                    {{-- <li @if (ROUTE::current()->uri == 'upcoming-webinars') class="active"  @endif>
               <a href="{{ route('upcoming_webinars') }}">Upcoming webinars</a>
            </li>
            <li @if (ROUTE::current()->uri == 'videos-on-demand') class="active"  @endif>
               <a href="{{ route('videosOnDemand') }}">ce/videos on demand</a>
            </li>

            <li @if (ROUTE::current()->uri == 'ce-archives') class="active"  @endif>
               <a href="{{ route('ceArchives') }}">ce archives</a>
            </li> --}}
                </ul>
                <div class="row mb-2">
                    <div class="col-md-4 ml-auto text-right">
                        <a href="" class="upcoming_view_all">View All >></a>
                    </div>
                </div>
                <div class="row w-100 video-cat-main m-0" id="video-container">
                    @forelse ($videos as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="video-box-main">
                                <div class="video-box">
                                    <iframe src="{{ $item->video_link }}" title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="video-bottom-text">
                                    <a class="video-title"
                                        >{{ $item->video_title }}

                                    </a>
                                    <div>
                                        <p>55 mins</p>
                                        @for ($i = 1; $i <= $avg ; $i++)
                                        <span class="fas fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="video-bottom-description">
                                    <h5>02/17/2022</h5>
                                    <p><span>Presented by:</span> {{ $item->presented_by }}<br />
                                        {{-- <strong>Sponsored by:</strong> VetVine --}}
                                    </p>
                                    <p class="para-decription">
                                        {{ $item->video_description }}
                                    </p>
                                    <a href="{{ route('video_desc', [$item->id, $item->category_id]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5>No Data Found</h5>
                    @endforelse

                </div>
            </div>
        </section>
        @section('scripts')
            <script>
                $(document).ready(function() {
                    $("#search").click(function() {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('videos.search') }}",
                            type: 'post',
                            data: {
                                title: $("#title").val(),
                                category: $("#category_id").val(),
                                presenter: $("#presenter").val(),
                                sponser: $("#sponser_id").val(),
                            },
                            success: function(response) {
                                $("#video-container").html(response.html);
                            }
                        })
                    })
                })
            </script>
        @endsection
    @endsection
