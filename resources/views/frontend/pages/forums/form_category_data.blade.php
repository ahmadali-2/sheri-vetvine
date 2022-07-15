@forelse ($categories as $category)
    <div class="specialty-info">

        <div class="topics-section col-lg-12 ">
            <div class="behavior-card col-lg-6 col-md-6">
                <div class="behavior-img"><img src="{{ asset('frontend/forums/img/heal-icon-1.png') }}"
                        alt="behavior img"></div>
                <div class="behavior-details ">
                    <div class="behavior-title">
                        <a href="{{ route('getForums', $category->id) }}">
                            <h2 class="uppercase">{{ $category->category_title ?? '' }}</h2>
                        </a>
                    </div>

                    <p class="forum_desc">{{ Str::limit($category->category_description , 100) }}</p>

                </div>

                {{-- <p class="forum_desc">

                </p> --}}



            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="date-ms  col-lg-6 col-md-6 col-sm-6 max_width_screen">
                        <div class="behavior-card-right  text-center comment_forum">
                            <div class="behavior-img-2">
                                <p class="topi">Topics</p>
                                <div class="combine">
                                    <img src="{{ asset('frontend/forums/img/message.png') }}"
                                        alt="behavior img"><span>{{ $category->forums->count() }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="date-ms  col-lg-6 col-md-6 col-sm-6 max_width_screen">

                        <div class="behavior-card-right  text-center comment_forum combine_2">
                            <p class="topi">Recent Activity</p>

                            <div class="behavior-img-2"><span>{{ date('M d ,Y', strtotime($category->created_at)) }}</span></div>

                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>
@empty
    <h3>Not Found!</h3>
@endforelse