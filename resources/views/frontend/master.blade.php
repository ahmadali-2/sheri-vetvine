<!DOCTYPE html>

<html lang="en">



<head>

    <!-- ************************************************************************ !-->

    <!-- ****                                                              **** !-->

    <!-- ****       ¤ Designed and Developed by  LEADconcept               **** !-->

    <!-- ****               http://www.leadconcept.com                     **** !-->

    <!-- ****                                                              **** !-->

    <!-- ************************************************************************ !-->

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>VETVINE</title>

    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />




    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .nav-wrapper-one a {

            padding: 5px 30px 5px !important;

        }

        @media (max-width:991px) and (min-width:768px) {

            .nav-wrapper-one a {

                padding: 0px 30px 0px !important;

            }
        }

        .email_heading {
            position: relative;
        }

        .email_heading::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 15%;
            height: 2px;
            background: #f27222;

        }

        .email_heading::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            width: 15%;
            height: 2px;
            background: #f27222;

        }

        @media(max-width:500px) {
            .email_heading {
                font-size: 22px !important;
            }

            .btn_email_resend {
                margin-left: 10% !important;
            }
        }
    </style>

    {{-- @notifyCss --}}

    @toastr_css

    @yield('extra_css')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
</head>



<body>



    @include('common.deletemodal')
    @if (Auth::user())
        @include('vetvineUsers.layouts.dashboard_header')
    @else
        @include('frontend.layouts.header')
    @endif
    @yield('content')
    @include('frontend.layouts.footer')



    <!-- </footer> -->
    <script src="{{ asset('bootstrap/jquery/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />



    <script>
        $('.show_confirm').click(function() {
            var id = $(this).attr('data-id');
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete Me!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('delete.user') }}",
                            data: {
                                id: id,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                    // window.reload()
                                ),
                                $('.swal2-confirm').on('click', function() {
                                    location.reload();
                                });
                                // window.location.reload()
                            }
                        });

                    }
                });
            } else {
                toastr.error('Cannot Delete!');
            }
        });

    </script>
 <script>
    $(document).ready(function() {
        //step1 hide buttons until user select the network level

        // Initialize select2
        $("#setCountries").select2();

        $('.select2-search--dropdown').css({
            'border': '1px solid black !important'
        });

        $('.select2-container').css({
            'width': '100%'
        });

        // Read selected option
        $('#but_read').click(function() {
            var username = $('#setCountries option:selected').text();
            var userid = $('#setCountries').val();

            $('#result').html("id : " + userid + ", name : " + username);

        });

        $('.socialbtns').css({
            'pointer-events': 'none'
        });

        $('#submitbtn').css({
            'pointer-events': 'none'
        });
    })

    $('.nave_google_captcha').on('click', function() {
        alert("oj");
    })


    //step2 get value of member level and network level
    $('.ui-corner-top').on('change', function() {

        var usertype = $(this).find('span').attr('data-memberlevel');
        $('#setmemberlevel').val(usertype);
        var networkLevel = $('input[name="networklevel"]:checked').val()
        console.log(networkLevel)
        $('#regibtnsmsg').hide();
        $('.socialbtns').css({
            'pointer-events': 'visible'
        });
        $('#submitbtn').css({
            'pointer-events': 'visible'
        });
        //step3 make custom url against member level and network level
        var urlarray = ['social/facebook', 'social/twitter', 'social/google'];
        $('.socialbtns ').each(function(item, index) {
            $(this).attr('href', urlarray[item]);
            var anchorlick = $(this).attr('href');
            var curlink = $(this).attr('href', anchorlick + '/' + usertype + '/' + networkLevel);
        })
    })

    $('#nav_id_google').on('click', function() {
        alert("oaspda");
    });

    $('#email').on('keyup', function() {
        $('#emailmsg').empty()
    })
    $('#password').on('keyup', function() {
        $('#passwordmsg').empty()
    })

    $(document).ready(function() {

        let a = $(".pad-left-captha").find("a").css("display", "none");
        // console.log(a);


    })



    $('#regform').submit(function(e) {

        if (grecaptcha.getResponse() == '') {
            toastr.error('Please verify captcha first!');
            e.preventDefault();
            return;
        } else {

        }

    })
</script>
    <script>
        $(document).ready(function() {

            let count = 0;
            let count2 = 0;
            $(document).on('click', '.dropdown-toggle', function(event) {
                count++;
                if (count == 1) {
                    $('.dropdown-cart').trigger('click');
                }
            });

        });
    </script>

    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>

    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>



    <script src="https://kit.fontawesome.com/b8867474d2.js" crossorigin="anonymous"></script>

    <script src="{{ asset('frontend/js/fontawesome.js') }}"></script>

    <script src="{{ asset('frontend/js/frontend.js') }}"></script>


    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\RegistrationRequest', '#regform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactUsRequest', '#conatctusform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\LoginInRequest', '#loginRequest') !!}



    <script src="{{ asset('bootstrap/jquery/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>



    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>

    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>



    <script src="https://kit.fontawesome.com/b8867474d2.js" crossorigin="anonymous"></script>

    <script src="{{ asset('frontend/js/fontawesome.js') }}"></script>

    <script src="{{ asset('frontend/js/frontend.js') }}"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>



    <script>
        CKEDITOR.replace('description');
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\RegistrationRequest', '#regform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactUsRequest', '#conatctusform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\LoginInRequest', '#loginRequest') !!}



    @yield('scripts')



    @toastr_js

    @toastr_render

    @notifyJs


    <x:notify-messages />


    @if (Route::currentRouteName() === 'login')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();

                $('#login-modal').modal('show');

            });
        </script>
    @endif

    @if (Route::currentRouteName() !== 'password.request')

        @if (count($errors) > 0)

            @if ($errors->has('email') || $errors->has('password'))
                <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>

                <script type="text/javascript">
                    $(document).ready(function() {

                        $('#login-modal').modal('show');

                        $('#errormsg').css({

                            'display': 'block'

                        });

                        $('#errormsg').html(`<strong>Error</strong> User Credentials Does Not Match , Try Again`);

                    });
                </script>
            @endif

        @endif

    @endif
</body>

</html>
