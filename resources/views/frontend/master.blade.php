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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="{{ asset('bootstrap/jquery/popper.min.js') }}"></script>

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
