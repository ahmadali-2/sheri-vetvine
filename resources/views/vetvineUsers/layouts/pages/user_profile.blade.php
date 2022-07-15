@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
    <!-------sidbar------>
    <form method="post" action="{{ route('personelinfo.store') }}" id="profile_form" enctype="multipart/form-data">
        @csrf
        <div class="container sidebar-new">
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-lg-3 col-xl-2 sidebar-new-bg pt-4">
                    <div class="user-img">
                        @if (Auth::user()->profile_photo)
                            <img src="{{ asset('/frontend/images/Profile-Images/' . Auth::user()->profile_photo) }}"
                                alt="" id="user-image">
                        @else
                            <img src="{{ asset('frontend/images/dummy.png') }}" alt="" id="user-image"">
                        @endif

                        {{-- <img src="{{ asset('frontend/img/profile-pic.png') }}" alt="hi"> --}}
                        <h4>{{ Auth::user()->name }}</h4>

                    </div>
                    <div class="nav-bg tabs_li">
                        <ul class=" nav navs-tabs " role="tablist">
                            <li class="listItemA "><a href="#tabs-1" class="new_active click_show_1" role="tab"
                                    data-toggle="pill" class="active"><i class="fas fa-chevron-right"></i>
                                    Personal Information</a>
                            </li>
                            <li class="listItemA"><a href=".tabs-2" class="tab_2_click" role="tab" data-toggle="pill"><i
                                        class="fas fa-chevron-right"></i>
                                    Contact Information</a></li>
                            <li class="listItemA"><a href=".tabs-3" class="tab_3_click" role="tab" data-toggle="pill"><i
                                        class="fas fa-chevron-right"></i>
                                    Edit My Photo</a></li>
                        </ul>
                    </div>
                </div>
                @php
                    $permissions = vetvineHelper::getUserTypePermissions(Auth::user()->type);
                @endphp
                <div class="col-12 col-sm-12 col-lg-9 col-xl-10 tab-content">
                    <div class="tab-pane active in" id="tabs-1">
                        <div class="general-area">
                            <div class="row no-gutters">
                                <div class="col-md-9 profile">
                                    <div class="general-area placeholder2_label">

                                        <div class="serch-section ">
                                            <div class="inner-input">
                                                <label>First Name*</label>

                                                <div class="input_field">

                                                    <input type="text" placeholder="" required class="form-control"
                                                        name="firstname" id="firstname"
                                                        value="@php
                                                            $str = Auth::user()->name;
                                                            $arr = explode(' ', $str);
                                                            echo $arr[0];
                                                        @endphp" />
                                                    <span class="asteric" id="error1"></span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Last Name*</label>
                                                <div class="input_field">
                                                    <input type="text" placeholder="" required class="form-control"
                                                        name="lastname" id="lastname"
                                                        value="@php
                                                            $str = Auth::user()->name;
                                                            $arr = explode(' ', $str);
                                                            if (count($arr) > 1) {
                                                                echo $arr[1];
                                                            }
                                                        @endphp" />
                                                    <span class="asteric" id="error2"></span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @dd($usernetworks) --}}
                                        <div class="serch-section ">
                                            <div class="inner-input">
                                                <label>I am a*</label>
                                                <div class="input_field">
                                                    <select class="form-control" name="usernetwork" id="usernetwork">
                                                        <option value="">Select Network</option>
                                                        @foreach ($usernetworks as $usernetwork)
                                                            @if (isset(Auth::user()->network_id) && Auth::user()->network_id == $usernetwork->id)
                                                                <option value='{{ $usernetwork->id }}' selected>
                                                                    {{ $usernetwork->name }}</option>;
                                                            @else
                                                                <option value="{{ $usernetwork->id }}">
                                                                    {{ $usernetwork->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="asteric" id="error3"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serch-section">
                                            @if($licensurePermissions->network_id == 6 || $licensurePermissions->network_id == 7 )
                                                <div class="inner-input" id="license-div">
                                                    <label>Licensure*</label>
                                                    <div class="input_field">
                                                        <input placeholder="" class="form-control license-inp" name="licensure"
                                                            id="licensure" value="{{ Auth::user()->licence_no }} "
                                                            >
                                                        <span class="asteric" id="error4"></span>
                                                    </div>
                                                </div>
                                            @endif
                                                {{-- <input type="hidden" name="" id="type" value="{{ Auth::user()->type }}"> --}}
                                            {{-- @endif --}}
                                            <div class="serch-section">
                                                <div class="inner-input">
                                                    <label>Timezone*</label>
                                                    <div class="input_field">

                                                        <select class="form-control" name="timezone" id="timezone">
                                                            <option value="">Select Timezone</option>
                                                            @foreach ($timezones as $timezone)
                                                                @if (isset(Auth::user()->timezone_id) && Auth::user()->timezone_id == $timezone->id)
                                                                    <option value='{{ $timezone->id }}' selected>
                                                                        {{ $timezone->timezone }}</option>;
                                                                @else
                                                                    <option value="{{ $timezone->id }}">
                                                                        {{ $timezone->timezone }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                        <span class="asteric" id="error5"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="button col-sm-12 text-center"><button type="button"
                                                    id="personal_btn" class="btn btn-Continue">Save & Continue</button>
                                            </div>


                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-3 add-img p-md-0">
                                    <a href="#"><img src="{{ asset('frontend/img/add-img.png') }}"
                                            class="img-fluid"></a>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="tab-pane" id="tabs-2">
                        <div class="general-area">
                            <div class="row no-gutters">
                                <div class="col-md-9 profile">

                                    <div class="general-area">

                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Email Address</label>
                                                <div class="input_field">
                                                    <input type="email" name="email" id="email" readonly
                                                        value="{{ Auth::user()->email ?? '' }}" placeholder=""
                                                        class="form-control" />
                                                    <span class="asteric" id="error6"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Confirm Email Address</label>
                                                <div class="input_field">
                                                    <input type="email" name="business_email" id="business_email"
                                                        value="{{ $employmentInfo->business_email ?? '' }}"
                                                        placeholder="" class="form-control" />
                                                    <span class="asteric" id="error6"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Primary Phone Number*</label>
                                                <div class="input_field">
                                                    <input type="number" name="work_phone" id="work_phone"
                                                        value="{{ $employmentInfo->work_phone ?? '' }}" placeholder=""
                                                        class="form-control" />
                                                    <span class="asteric" id="error7"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <h2 class="heading_employment">Employment Info</h2>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Hospital or Business Name</label>
                                                <div class="input_field">
                                                    <input type="text" name="business_name" id="business_name"
                                                        value="{{ $employmentInfo->business_name ?? '' }}"
                                                        placeholder="" class="form-control" />
                                                    <span class="asteric" id="error8"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Country*</label>
                                                <div class="input_field">
                                                    <select class="form-control" name="country" id="country">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            @if (isset($employmentInfo->country) && $employmentInfo->country == $country->id)
                                                                <option value="{{ $country->id }}" selected>
                                                                    {{ $country->country_name }}</option>
                                                            @else
                                                                <option value="{{ $country->id }}">
                                                                    {{ $country->country_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="asteric" id="error9"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>Address*</label>
                                                <div class="input_field">
                                                    <input name="street_address" id="street_address" placeholder=""
                                                        class="form-control"
                                                        value="{{ $employmentInfo->street_address ?? '' }}">
                                                    <span class="asteric" id="error10"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serch-section">
                                            <div class="inner-input">
                                                <label>City*</label>
                                                <div class="input_field">
                                                    <input type="text" name="city" id="city"
                                                        value="{{ $employmentInfo->city ?? '' }}" placeholder=""
                                                        class="form-control" />
                                                    <span class="asteric" id="error11"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button col-sm-12 text-center"><button type="button" id="employe_btn"
                                                class="btn btn-Continue">Save & Continue</button></div>
                                    </div>


                                </div>
                                <div class="col-md-3 add-img p-md-0">
                                    <a href="#"><img src="{{ asset('frontend/img/add-img.png') }}"
                                            class="img-fluid"></a>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="tab-pane" id="tabs-3">

                        <div class="general-area">
                            <h2>Edit My Profile</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="@if (Auth::user()->profile_photo) {{ asset('/frontend/images/Profile-Images/' . Auth::user()->profile_photo) }} @else {{ asset('frontend/images/thumbnail.jfif') }} @endif"
                                        alt="" id="user-image" height="200px"> <br>
                                    <button type="button" class="btn btn-dark mt-3"
                                        onclick="document.getElementById('profile_photo').click()">Choose File</button>
                                    <input type="file" style="visibility:hidden" name="profile_photo"
                                        id="profile_photo"
                                        onchange="document.getElementById('user-image').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>

                        <div class="button col-sm-12 text-center"><button type="submit" class="btn btn-Continue">Update
                                Profile</button></div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        window.onload = function(){
            if(localStorage.getItem('guestLogin') == 'true'){
                if(localStorage.getItem("eventUrl") != ''){
                    location.href=localStorage.getItem("eventUrl");
                }
            }
        }

        $('#firstname').on('keyup', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error1').css("visibility", "hidden");
            } else {
                $("#error1").html("First name field can't be left blank.");
                $(this).closest('div').find('#error1').css("visibility", "visible");
            }
        });
        $('#lastname').on('keyup', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error2').css("visibility", "hidden");
            } else {
                $("#error2").html("Last name field can't be left blank.");
                $(this).closest('div').find('#error2').css("visibility", "visible");
            }
        });
        $('#usernetwork').on('click', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error3').css("visibility", "hidden");
            } else {
                $("#error3").html("Network field can't be left blank.");
                $(this).closest('div').find('#error3').css("visibility", "visible");
            }
        });
        $('#licensure').on('keyup', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error4').css("visibility", "hidden");
            } else {
                $("#error4").html("Licensure field can't be left blank.");
                $(this).closest('div').find('#error4').css("visibility", "visible");
            }
        });
        $('#timezone').on('click', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error5').css("visibility", "hidden");
            } else {
                $("#error5").html("Timezone field can't be left blank.");
                $(this).closest('div').find('#error5').css("visibility", "visible");
            }
        });
        $('#work_phone').on('keyup', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error7').css("visibility", "hidden");
            } else {
                $("#error7").html("Work phone field can't be left blank.");
                $(this).closest('div').find('#error7').css("visibility", "visible");
            }
        });
        $('#country').on('click', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error9').css("visibility", "hidden");
            } else {
                $("#error9").html("Country field can't be left blank.");
                $(this).closest('div').find('#error9').css("visibility", "visible");
            }
        });
        $('#street_address').on('keyup', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error10').css("visibility", "hidden");
            } else {
                $("#error10").html("Street address field can't be left blank.");
                $(this).closest('div').find('#error10').css("visibility", "visible");
            }
        });
        $('#city').on('keyup', function() {
            if ($(this).val().length > 0) {
                $(this).closest('div').find('#error11').css("visibility", "hidden");
            } else {
                $("#error11").html("City field can't be left blank.");
                $(this).closest('div').find('#error11').css("visibility", "visible");
            }
        });
        $(document).ready(function(e) {
            $("#personal_btn").on("click", function(e) {
                if ($("#licensure").length != 0) {
                    if ($.trim($('#firstname').val()) == '' || $.trim($('#lastname').val()) == '' || $.trim(
                            $('#licensure').val()) == '' || $.trim($('#usernetwork').val()) == '' || $.trim($('#timezone').val()) == '') {
                        toastr.error('Make sure compulsory fields are not empty.');
                        return;
                    } else {
                        // alert('running');
                        $("#tabs-2").addClass("tabs-2");
                        $(".tab_2_click").trigger("click");
                        $('.tabs_li').find('.new_active').removeClass('new_active');
                        $(".tab_2_click").addClass('new_active');
                        $(".tab_2_click").addClass('click_show_2');
                    }

                } else {
                    if ($.trim($('#firstname').val()) == '' || $.trim($('#lastname').val()) == '' ||
                        $.trim($('#usernetwork').val()) == '' || $.trim($(
                            '#timezone').val()) == '') {
                        toastr.error('Make sure compulsory fields are not empty.');
                        return;
                    } else {
                        // alert('running');
                        $("#tabs-2").addClass("tabs-2");
                        $(".tab_2_click").trigger("click");
                        $('.tabs_li').find('.new_active').removeClass('new_active');
                        $(".tab_2_click").addClass('new_active');
                        $(".tab_2_click").addClass('click_show_2');
                    }
                }
            });
            $("#employe_btn").on("click", function(e) {
                if ($.trim($('#street_address').val()) == '' ||
                    $('#country option:selected').val() == '' || $.trim($('#city').val()) == '' ||
                    $.trim($('#work_phone').val()) == '') {
                    toastr.error('Make sure compulsory fields are not empty.');
                    return;
                } else {
                    $("#tabs-3").addClass("tabs-3");
                    $(".tabs-3").trigger("click");
                    $(".tab_3_click").trigger("click");
                    $('.tabs_li').find('.new_active').removeClass('new_active');
                    $(".tab_3_click").addClass('new_active')
                    $(".tab_3_click").addClass('click_show_3');
                }
            })
            $("#submit_btn").on("click", function(e) {
                e.preventDefault();

                $("#profile_form").submit();
            })
        })
        $(document).ready(function() {
            $(".listItemA a").on("click", function(e) {
                $(this).parent('li').find('a').removeClass('active');
            })
        })
        $(document).on("click", ".click_show_2", function(e) {
            $('.tabs_li').find('.new_active').removeClass('new_active');
            $(this).addClass('new_active');
        })
        $(document).on("click", ".click_show_3", function(e) {
            $('.tabs_li').find('.new_active').removeClass('new_active');
            $(this).addClass('new_active');
        })
        $(document).on("click", ".click_show_1", function(e) {
            $('.tabs_li').find('.new_active').removeClass('new_active');
            $(this).addClass('new_active');
        })

        $(document).on("change", "#usernetwork", function() {
            var networdId = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('licensure.show') }}",
                type: "post",
                data: {
                    networkId: networdId
                },
                success: function(response) {
                    console.log(response.network_id);
                    if(response.network_id === 6 || response.network_id === 7){
                        $('.license-inp').attr('id', 'licensure');
                        $("#license-div").show();
                    }else{
                        $('.license-inp').removeAttr('id');
                        $("#license-div").hide();
                    }
                }
            });
        });
    </script>
@endsection
