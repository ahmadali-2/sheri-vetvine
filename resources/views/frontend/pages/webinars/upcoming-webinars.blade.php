@extends('frontend.master')
@section('content')


<main>
    <section class="main_banner main_banner_grow">
      <div class="container">
        <div class="flex-box-banner">
          <div class="grow_banner_box grow_banner_box_web">
            <div class="grow-heading">GROW</div>
            <img src="{{ asset('frontend/images/sep-line-2.jpg') }}" width="250" height="2" alt="" class="line_image">
            <p class="mb-0">Learn from world renowned animal experts to empower yourself and grow.
            </p>

          </div>
        </div>
      </div>
    </section>
  </main>

  <section class="main_banner_bottob_label"></section>

    <section class="video-section-wrapper mb-4">
        <div class="container">
            <h1 class="Upcoming-webinars mt-2">Upcoming Webinars</h1>
            <form action="{{ route('search_educations') }}" method="post">
                @csrf
                <ul class="filter_list upcoming_filter">


                    <li class="top-three-input first_li">
                        <label>Search By :</label>
                        {{-- <input type="text" class=" form-control" name="name"> --}}
                    </li>

                    <li class="top-three-input">
                        <label>Title / Keyword</label>
                        <input type="text" class=" form-control" name="name">
                    </li>
                    <li>
                        <div id="fav_show_wrapper mt-0">
                            <label for="fav_Show" id="fav_show_label">Category</label>
                            <select id="category" name="category" class="form-control filter-slect" value=""
                                data-val="true">
                                <option title="" value="" label=""></option>
                                @foreach ($category as $search)
                                    <option value="{{ $search->id }} ">{{ $search->category_title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </li>
                    <li class="top-three-input">
                        <label> Presenter </label>
                        <input type="text" class=" form-control" name="presenter">
                    </li>
                    <li class="last_li">
                        <label>Sponsor</label>
                        <input type="text" class=" form-control" name="sponser">
                    </li>

                    <li>
                        <button class="btn filter-searchBtn search_btn_hover" type="submit" value="search">Search</button>
                    </li>
                </ul>
            </form>
            {{-- @dd(ROUTE::current()->uri); --}}
            <ul class="page-link-list">
                {{-- <li @if (ROUTE::current()->uri == 'upcoming-webinars') class="active"  @endif>
                    <a href="{{ route('upcoming_webinars') }}">Continuing Education</a>
                </li>
                @if (Auth::user())
                <li @if (ROUTE::current()->uri == 'past-event') class="active"  @endif>
                    <a href="{{ route('pastevent') }}">My Past Events</a>
                </li>
                <li @if (ROUTE::current()->uri == 'upcoming-event') class="active"  @endif>
                    <a href="{{ route('upcomingevent') }}">My Upcoming Events</a>
                </li>
                @endif --}}
            </ul>


            <div class="row mb-2">
                <div class="col-md-4 ml-auto text-right">
                    <a href="#" class="upcoming_view_all">View All >></a>
                </div>
            </div>
            <div class="row w-100 video-cat-main m-0">
                @foreach ($showevent as $showevents)
                    <div class="col-md-6 col-lg-4 p-0">
                        <div class="video-box-main upcoming_content">
                            @if ($showevents->main_photo)
                                <div class="   pl-0">
                                    <img src="{{ asset('/admin/eventss/' . $showevents->main_photo) }} " alt=""
                                        id="user-image" height="100px">
                                </div>
                            @elseif ($showevents->event_add_ytlink)
                                <div class="video-box">
                                    <iframe src="{{ $showevents->event_add_ytlink }}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                            <div class="video-bottom-text">
                                <h3>{{ $showevents->event_title }}</h3>
                                </h3>
                                <div>

                                </div>
                            </div>
                            @if (Auth::user())
                                @php
                                    // Time Convert Acoording to timezone
                                    $eventTime = $showevents->time;
                                    $timeZone = $showevents->user->timezone->timezone;

                                    // Fetching timezone UTC code : Please don't screw it
    $pieces = explode('(', $timeZone);
    $pieces = explode('C', $pieces[1]);
    $pieces = explode(')', $pieces[1]);

    // Formatting the time
    $today = new DateTime($showevents->time, new DateTimeZone($pieces[0]));

    $userTimeZone = Auth::user()->timezone->timezone;

    // Fetching timezone UTC code : Please don't screw it
                                    $pieces = explode('(', $userTimeZone);
                                    $pieces = explode('C', $pieces[1]);
                                    $pieces = explode(')', $pieces[1]);

                                    $userEventTime = new DateTimeZone($pieces[0]);
                                    $convertedTime = $today->setTimeZone($userEventTime);

                                    $formattedTime  =  $convertedTime->format('H:i A');
                            @endphp
                             @endif
                            <div class="video-bottom-description">
                                <h5 class="my-3">{{ date('m/d/Y', strtotime($showevents->date)) }}</h5>
                                {{-- @if (Auth::user())
                                <h5>Start Time : {{ date('g:i a', strtotime($formattedTime)) }}</h5>
                               @endif --}}
                                <p><strong>Presented by:</strong> <a href="{{ $showevents->presenter_one_url }}"
                                        class="vetvine_a" target="_blank">{{ $showevents->presenter_one }}</a>

                                <div class="parent_sponser">


                                    <strong>Sponsored by:</strong>
                                    <div class="sposer_name">
                                        @foreach ($showevents->members as $item)
                                            <a href="{{ $item->sponser_link }}" class="vetvine_a" target="_blank"
                                                rel="noopener noreferrer">{{ $item->sponser_name }}</a>
                                        @endforeach

                                    </div>

                                </div>
                                </p>


                                </p>
                                <p class="para-decription">
                                    {{ Str::limit($showevents->event_description, 250) }}
                                </p>

                                <a href="{{ route('upcoming_details', $showevents->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
