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
    <section class="main_banner_bottob_label" id="redirect_home_ce_div"></section>

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
                            <div class="img_post_left"><img src="@if(Auth()->user()->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/'.Auth()->user()->profile_photo)}} @else {{asset('frontend/images/dummy.png')}} @endif" width="262"
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
        $(document).ready(function () {
            // Handler for .ready() called.
            $('html, body').animate({
                scrollTop: $('#redirect_home_ce_div').offset().top
            }, 'slow');
        });
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

