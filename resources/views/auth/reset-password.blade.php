<style>
    .forgot_container{
        padding: 10px 0px 50px 0px;
    }
    .box{
        background-color: #e6e6e6;
        padding: 30px;
    }
    .reset{
        font-weight: bold;
        font-size: 30px;
        margin-bottom: 20px;
        text-transform: uppercase;
        color: #5c7c85;
    }
    </style>
@extends('frontend.master')

@section('content')



<div class="container forgot_container" style="margin-top:50px; margin-bottom:30px">  

    <div class="row">

        {{-- <div class="col-md-3"></div> --}}

        <div class="col-md-12"><h2 class="text-center reset">Reset Your Password</h2></div>
        <div class="col-md-6 mx-auto box">

          

        <x-jet-validation-errors class="mb-4" />



        <form method="POST" action="{{ route('password.update') }}">

            @csrf



            <input type="hidden" name="token" value="{{ $request->route('token') }}">



            <div class="block">

                <x-jet-label for="email" value="{{ __('Email') }}" />

                <input id="email" style="border: 1px solid #ced4da !important;

                " class="form-control block mt-1 w-full" type="email" name="email" readonly value="{{ $request->email }}" required autofocus />

            </div>



            <div class="mt-4">

                <x-jet-label for="password" value="{{ __('Password') }}" />

                <input id="password" style="border: 1px solid #ced4da !important;

                " class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            </div>



            <div class="mt-4">

                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />

                <input id="password_confirmation" style="border: 1px solid #ced4da !important;

                " class="form-control block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            </div>



            <div class="flex items-center justify-center mt-4">

                <x-jet-button>

                    {{ __('Reset Password') }}

                </x-jet-button>

            </div>

        </form>

        </div>

</div>

</div>

  @endsection