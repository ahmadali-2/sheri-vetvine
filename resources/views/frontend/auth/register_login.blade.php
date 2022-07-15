<div class="popup-body">
    <h2 class="member-login"><span>Member Login</span></h2>
    <div class="register-in-login">new to VETVINE?
        <a class="Register-Now" href="#" id="register_show_modal_login">Register now</a>
    </div>
    <form action="{{ route('login') }}" method="post" class="custom_form" id="loginRequest">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" id="errormsg" style="display: none;">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="" class="my-custom_label">Email</label>
                    <input type="email" id="email" name="email" placeholder="" class="my-custom_input">
                    <span id="emailmsg" style="color: red;"></span>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="my-custom_label">password</label>
                    <input type="password" id="password" name="password" placeholder=""
                        class="my-custom_input">
                    <span id="passwordmsg" style="color: red;"></span>
                </div>
            </div>
            <div class="col-12">
                <span class="keep-logged"><label for="checkme"><input type="checkbox" id="checkme">
                        Keep me logged
                        in</label></span>
                <span class="forgaot">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </span>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <div class="social_icons_modal">
                <a href="{{ url('social/facebook/0/0') }}" class="socialbtnslogin "><i
                        class="fa fa-facebook-square " aria-hidden="true"></i></a>
                <a href="{{ url('social/twitter/0/0') }}" class="socialbtnslogin"><i
                        class="fa fa-twitter-square " aria-hidden="true"></i></a>
                <a href="{{ url('social/google/0/0') }}" class="socialbtnslogin"><i
                        class="fa fa-google " aria-hidden="true"></i></a>
            </div>

        </div>
        <div class="popup-footer">
            <input type="submit" value="Log In" class="toggle button send-msg">
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#register_show_modal_login").on("click",function(e){
         e.preventDefault();
         $("#registration_modal_box_show_btn").trigger("click");
         $("#email_verify_modal_close").trigger("click");
    });

    $('#continue_guest').on('click', function(){
    $('#guest_continue_loading').css('display','block');
    setTimeout(
    function()
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: "GET",
        url: '/next-guest-screen',
        data: {guest_screen: 2},
        success: function(response){
            $('#login_main_body').empty();
            $('#login_main_body').append(response.html);
        }
    })
    }, 1000);
});
</script>
