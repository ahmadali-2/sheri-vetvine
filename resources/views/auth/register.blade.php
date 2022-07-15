@extends('frontend.master')
@section('content')
    <style>
        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D;
            color: #fff;
        }

        .btn-twitter {
            background-color: #42AEEC;
            color: #fff;
        }

        .btn-google {
            background-color: #da1010;
            color: #fff;
        }



    </style>

    <div style="margin-top: 20px;margin-bottom:20px;width:100%">
        <article class="card-body mx-auto"
            style="max-width: 600px;background-color:rgb(220, 221, 221);box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with account</p>


            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control" name="type" id="type" onchange="typeSelected(this.value)">
                        <option value="" selected> Select Member Level</option>
                        <option value="3">Vet Professional</option>
                        <option value="7">Pet Owner</option>
                        <option value="8">Pet Professional</option>
                    </select>
                </div>

                {{-- Sub Types of Veternary Professional --}}
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <select class="form-control" name="network_type" id="network_type"
                        onchange="networkSelected(this.value)">
                        <option value="" selected=""> Select Network Type</option>
                        <option value="1">Veterinarian</option>
                        <option value="2">Veterinary Specialist</option>
                        <option value="3">Technician</option>
                        <option value="4">Veterinary Client Care / Hospital Admin</option>
                        <option value="5">Student</option>
                        <option value="6">Pet Owner</option>
                        <option value="7">Other Service Provider</option>
                    </select>
                </div>






                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
                    </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text" id="full_name">

                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" id="email">

                </div> <!-- form-group// -->
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

                <!-- form-group end.// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Create password" type="password" name="password"
                        id="password">
                </div>
                <!-- form-gr                                                                                         oup// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="password" name="password_confirmation"
                        id="confirm_password">

                </div> <!-- form-group// -->
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block" id="btn_register"> Register </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a> </p>



            </form>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <p>
                <a href="{{ url('social/twitter') }}" class="btn btn-block btn-twitter btns"><i
                        class="fab fa-twitter-square ">&nbsp;</i>Login via Twitter</a>
                <a href="{{ url('social/facebook') }}" class="btn btn-block btn-facebook btns"><i
                        class="fab fa-facebook"></i>&nbsp;Login via Facebook</a>
                <a href="{{ url('social/google') }}" class="btn btn-block btn-google btns"><i
                        class="fab fa-google-plus-g"></i>&nbsp;
                    Login
                    via Google</a>

            </p>
        </article>
    </div> <!-- card.// -->

@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            if ($('#network_type').val() == '') {
                $('input').attr('disabled', 'disabled');

            }
            $('#btn_register').prop('disabled', true);
            $(".btns").addClass('disabled');

            $('#network_type').attr('disabled', 'disabled');


        });



        function typeSelected(val) {
            if ($('#type').val() == '' || $('#network_type').val() == '') {
                $('input').attr('disabled', 'disabled');
                $(".btns").addClass('disabled');
            } else {
                $('input').removeAttr('disabled');
                $(".btns").removeClass("disabled");
            }
            $('#type').attr('disabled', 'disabled');
            $('#network_type').removeAttr('disabled');

            // concat id with url for social login
            $('.btns').each(function() {
                var href = $(this).attr('href');
                $(this).attr('href', href + '/' + val);
            })
        }

        function networkSelected(val) {
            if ($('#type').val() == '' || $('#network_type').val() == '') {
                $('input').attr('disabled', 'disabled');
                $(".btns").addClass('disabled');
            } else {
                $('input').removeAttr('disabled');
                $(".btns").removeClass("disabled");
            }
            $('#type').attr('disabled', 'disabled');
            $('#network_type').attr('disabled', 'disabled');
            //concat id with url for social login


            $('.btns').each(function() {
                var href = $(this).attr('href');
                $(this).attr('href', href + '/' + val);
            })
        }


        //register button disable until all fields empty
        var fields = "#name, #email, #password, #confirm_password";
        $(fields).on('keyup', function() {
            if (allFilled()) {
                $('#btn_register').removeAttr('disabled');
            } else {
                $('#btn_register').attr('disabled', 'disabled');
            }
        });

        function allFilled() {
            var filled = true;
            $(fields).each(function() {
                if ($(this).val() == '') {
                    filled = false;
                }
            });
            return filled;
        }
    </script>
@endsection
