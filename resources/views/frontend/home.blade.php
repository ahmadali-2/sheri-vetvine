@extends('frontend.master')
@section('content')
<main>
    <section class="Section_top">
        <div class="container">
            <div class="flex-box-banner">
                <div class="grow_banner_box grow_banner_box_web home_box">
                    <div class="grow-heading">
                        <!-- </div> <img src="img/sep-line-2.jpg" width="250" height="2" alt="" class="line_image"> -->

                        <p> A better life for animals and the humans <br> who care for them.</p>

                        <div class="line"></div>
                        <a href="{{ route('why_vetvine') }}" class="btn btn-warning home_banner_btn">WHY VETVINE?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@if(isset($verifyEmail))
<div class="modal fade show" id="verify-email-modal" style="display: block;" aria-modal="true">
    <div class="modal-dialog custum_popup">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">

                <div class="popup-header">
                    <span class="popup-logo"><img src="{{ asset('frontend/images/popup-logo.png') }}"
                            alt="logo"></span>
                    <span class="close" id="email_verify_modal_close" data-dismiss="modal">&times;</span>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="popup-body">
                    <div class="row">
                        <h2 class="email_heading" style="border-bottom: 1px solid transparent !important; ">Verify
                            Your Email</h2>
                        <div class="col-sm-12 mx-auto box" style="background-color: transparent;">
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Welcome! Youre one step away from
                                                                                                                                                                                                                                        enjoying the benefits of VetVine.') }}
                            </div>

                            <p>We just sent an email to <b style="font-weight: 600; color: #4242fc"><a> {{ Str::of(Auth::user()->email)->limit(3) }}.@<?php $explode = explode('@',auth()->user()->email); $explode = explode('.',$explode[1]); echo ($explode[0]);?>.com</a></b>
                                Click on the link in that email to
                                complete your registration.</p>
                            <p>
                                Didn’t receive an email from us? Check your SPAM
                                folder. till cant find it?
                            </p>



                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif

                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="flex items-center justify-center mt-4">
                                    <x-jet-button class="" type="submit"
                                        style="margin-left: 20%;  background-color: #f27222;">
                                        {{ __('Resend Verification Email') }}
                                    </x-jet-button>
                                </div>
                            </form>

                            <p style="margin-top: 30px;">Need Help or Having Trouble? <a href="#"
                                    style="text-decoration: none; color:#f27222;"> Contact Us</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="popup-footer">

                </div>
            </div>
            {{-- End Modal body here --}}
        </div>
    </div>
</div>
@endif
<section class="main_banner_bottob_label">
    <div class="container">
        REGISTER TO ACCESS PET HEALTH EDUCATIONAL RESOURCES AND OTHER MEMBER BENEFITS
    </div>
</section>

<section class="become_member_area">
    <div class="container">

        <h2><span>BECOME A MEMBER</span></h2>
        <div class="row">

            <div class="col-md-12 col-lg-6 line_member_box">
                <img src="{{ asset('frontend/images/BECOME-1.png') }}" width="89" height="77" alt="">

                <h3>I'm a Veterinary / <br>
                    Pet Care Professional
                </h3>
                <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
                <p class="veterinary-para">
                    <strong> Guidance, support, and wisdom to keep animals healthy and happy. </strong>
                    VetVine<sup>®</sup> is
                    the "go to"
                    destination for
                    veterinary and pet care professionals seeking expert-driven information. <br>
                    We offer invaluable learning opportunities that support professionals in providing the best care
                    for
                    animals! Empower yourself and grow by accessing our first-class and highly-rated educational
                    offerings.
                </p>
                <p class="become_first_box_para_margin">
                    <strong>Because you're always there for them, we're always here for you. </strong>
                    VetVine<sup>®</sup> also supports the people who care for animals.
                    Through our wellness and resiliency coaching programs we support professionals in reconnecting
                    with their
                    purpose, achieving work-life balance, and in helping them to thrive (not just survive) in their
                    career.
                </p>

                <a href="#" class="btn_join_thepet" data-toggle="modal" data-target="#login-modal">JOIN THE
                    PROFESSIONAL
                    COMMUNITY ></a>

            </div>
            <div class="col-md-12 col-lg-6 ptg_meber_rightbox">
                <img src="{{ asset('frontend/images/BECOME-2.png')}}" class="mm-top-margin" width="90" height="41" alt="">

                <h3>I'm a Pet Owner
                </h3>
                <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
                <p class="mrg_top_rightbox2 veterinary-para">
                    Pet owners rely on VetVine<sup>®</sup> for trusted, expert-driven information. Here is where
                    they come to
                    learn about
                    various pet health concerns and, through our webinars and other resources, glean valuable
                    information on how
                    to best care for their animal companions.

                </p>
                <p> VetVine<sup>®</sup> also cares about the people who care for animals - no matter what they're
                    going
                    through. We cannot
                    imagine a world without them. But when our pets receive a bad diagnosis, are nearing the end of
                    their
                    natural life, or finally cross that rainbow bridge, our pet loss support service is here to
                    provide a safe,
                    nonjudgmental space where people can express their grief and honor the memories of their beloved
                    animals.
                </p>

                <a href="#" data-toggle="modal" data-target="#login-modal" class="btn_join_thepet">JOIN THE PET
                    OWNER
                    COMMUNITY ></a>

            </div>
        </div>


    </div>
</section>
<section class="grow_banner">
    <div class="container">
        <div class="mm-grow-new">
            <div class="grow_banner_box">
                <span class="grow-text"> GROW</span>
                <img src="{{ asset('frontend/images/sep-line-2.jpg')}}" width="250" height="2" alt="">

                <p class="learn_more_content">
                    Our mission is to provide guidance, support, and wisdom to pet care professionals to
                    benefit and
                    maximize the life and longevity of animals. Our accredited webinars and educational resources
                    help busy
                    professionals stay current and grow in their career.
                </p>
                <a href="{{ route('grow') }}" class="btn_why_vetvine">LEARN MORE</a>
            </div>
        </div>

    </div>
</section>

<section class="become_member_area thrive_area become_member_area_bottom">
    <div class="container">


        <div class="row">

            <div class="col-md-6 line_member_box2">
                <img src="{{ asset('frontend/images/thrive-icon.png')}}" width="86" height="83" alt="">

                <h3>THRIVE
                </h3>
                <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
                <p class="thrive_para">
                    Animal care professionals, like anyone working in the healing professions, can experience stress
                    and
                    distress in the course of their work. Cumulatively, this can lead to burnout and compassion wear
                    out.
                    Because you're always there for them, we're always here for you. Whether it's achieving
                    work-life balance,
                    creating positive change, or personal goal setting, our Wellness and Resiliency Coaching Program
                    can help.

                </p>

                <a href="#" class="btn_join_thepet">GET WELLNESS SUPPORT ></a>

            </div>
            <div class="col-md-6 ptg_meber_rightbox">
                <img src="{{ asset('frontend/images/thrive-icon2.png')}}" width="136" height="90" alt="">

                <h3>HEAL
                </h3>
                <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
                <p class="thrive-para heal_content">
                    Animals are often our most reliable source of comfort, support, and unconditional love. In fact,
                    we cannot
                    imagine a world without them.
                    They leave a mark on our hearts that’s felt long after they’re gone. The VetVine<sup>®</sup>
                    Virtual Pet
                    Loss Support
                    service was established to support people grieving the loss of an animal in their life - whether
                    due to the
                    death of a pet or loss of a relationship with an animal of any kind due to any circumstance.
                </p>
                <a href="#" class="btn_join_thepet">GET PET LOSS GRIEF SUPPORT ></a>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('ready', function(){
            $('#login_guest_selection')
        });

        if($('#email_verify_modal_close').length){
            $('#email_verify_modal_close').on('click', function(){
            $('#verify-email-modal').removeClass('show');
            $('#verify-email-modal').css('display','none');
        });
        }
    </script>
@endsection
