@php

$vetvineLogo =vetvineHelper::vetvineGeneralSetting()

@endphp

<header class="main-wrapper">

    <div class="top_Wrapper">

        <div class="container">

            <div class="top-social">

                <ul class="list__icons">

                    <li>

                        <div class="input-group mb-3">

                            <span class="search-text">Search: &nbsp;</span>

                            <input type="text" class="form-control top-search" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">

                            <div class="input-group-append">

                                <button class="btn search_btn" type="button"><i class="fa fa-search"></i></button>

                            </div>

                        </div>

                    </li>





                    @auth

                    <li> <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <a class="reg-login_btn" href="{{ route('logout') }}" onclick="event.preventDefault();

                        this.closest('form').submit();">Logout</a>

                    </form></li>

                    @else

                    <li> <a class="reg-login_btn" href="#" id="register_model_show">Register / Login</a></li>

                    @endauth









                    <li>

                        <a href="#" class="toggle-contact" data-toggle="modal" data-target="#myPopup"><span class="mail-logo"><i class="fa fa-envelope"></i></span> Contact Us</a>

                    </li>

                </ul>



            </div>

            </p>



        </div>

    </div>

    <!-- <img src="images/logo.png" class="img-fluid logo" alt="" srcset=""> -->

    <div class="container-fluid p-0">

        <div class="container">

            <nav class=" bg-header navbar navbar-expand-md">

                @if ($vetvineLogo == null)

                <a class="navbar-brand" href="{{ url('/') }}"><span class="header-logo"><img src="{{ asset('admin/images/logo.png')}}" class="img-fluid logo" alt="" srcset=""></span></a>

                @else

                <a class="navbar-brand" href="{{ url('/') }}"><span class="header-logo"><img src="{{ asset('admin/generalsetting/' .$vetvineLogo->logo)}}" class="img-fluid logo" alt="" srcset=""></span></a>

                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"><img src="{{ asset('frontend/images/menu-icon.png') }}" width="25" height="18" alt=""></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav nav-wrapper-one">


                        {{-- @include('frontend.layouts.main_sub_menu') --}}
                        <li class="nav-item droplink  ">

                            <a class="nav-link nav-anchor" href="{{ route('grow') }}" aria-haspopup="true">grow <i class="fas fa-chevron-down droplink1"></i> <br> <span class="nav-sub-hed"> Education</span></a>

                            <div class="subdrop subdrop1" aria-label="Main Links Sub Navigation">

                                <!-- <h2 class="nav-sub-hed">Education</h2> -->

                                <ul class="ewp-list">

                                    <li class="">

                                        <div class="edu-show1">

                                            <div class="vet-underline">

                                                <div class="sub-menu-flex">

                                                    <div class="flexrow1">

                                                        <!-- <u>Vet / Pet Professionals</u> -->

                                                        <ul>

                                                            <li><a href="{{ route('upcoming_webinars') }}">Upcoming Webinars</a></li>

                                  <li><a href="{{ route('videosOnDemand') }}">videos on demand</a></li>

                                                             <li><a href="#">Certificate & special programs</a></li>
                                                             <li><a href="{{route('forumsfrontend')}}">forums</a></li>
                                                             <li><a href="#">Pet Health Articles </a></li>

                                                        </ul>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </li>

                        <li class="nav-item droplink  ">

                            <a class="nav-link nav-anchor" href="{{ route('thrive') }}">thrive <i class="fas fa-chevron-down droplink2"></i>

                                <br> <span class="nav-sub-hed">Wellness</span>

                            </a>



                            <div class="subdrop subdrop2" aria-label="Main Links Sub Navigation">



                                <ul class="wallnes-ul">

                                    <li><a href="">wellness Coaching for professionals</a></li>

                                    <li><a href="">wellness Wisdom</a></li>

                                </ul>

                            </div>

                        </li>

                        <li class="nav-item droplink ">

                            <a class="nav-link nav-anchor" href="{{ route('heal') }}">heal <i class="fas fa-chevron-down droplink3"></i>

                                <br>

                                <span class="nav-sub-hed">Pet Loss Support</span>

                            </a>



                            <div class="subdrop subdrop3" aria-label="Main Links Sub Navigation">



                                <ul style="display: inline-block;">

                                    <li>

                                    <li><a href="">about Virtual pet loss support</a></li>

                                    <li><a href="">Schedule & Registration </a></li>

                                    <li><a href="">our Facilitators</a></li>

                                    <li><a href="">pet loss & grief Resources</a></li>

                        </li>

                    </ul>



                </div>



                </li>

                <li class="nav-item nav-last-child">

                    <a class="nav-link" href="{{ route('why_vetvine') }}"> why vetvine?</a>

                </li>





                </ul>



        </div>

        </nav>

    </div>



    @include('frontend.pages.general.contactus')

    @include('frontend.auth.register')



</header>
