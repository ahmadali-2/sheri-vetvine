<style>
    .forgot_container{
        padding: 30px 0px 50px 0px;
    }
    .box{
        background-color: #e6e6e6;
        padding: 30px;
    }
    </style>
    @extends('frontend.master')
    @section('content')
    
    <div class="container  forgot_container" style="margin-top:50px; margin-bottom:30px">  
        <div class="row">
            {{-- <div class="col-md-3"></div> --}}
            <div class="col-md-6 mx-auto box">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
    
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
    
            <x-jet-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <input  style="border: 1px solid #ced4da !important;
    
                    " id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="flex items-center justify-center mt-4">
                    <x-jet-button>
                        {{ __('Email Password Reset Link') }}
                    </x-jet-button>
                </div>
            </form>
            </div>
    </div>
    </div>
    
    
    @endsection