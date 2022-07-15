<style>
    .align-content{
        padding-left: 10%;
    }
    .fields{
        width: 70%;
    }
    .top_heading{
        color: '#577E80';
    }
    .bottom_heading{
        color: 'black';
    }
    .emailField{
        width: 90%;
    }
    .namesClass{
        padding: 5%;
    }
    .spacing{
        margin-top: 10px;
    }
    </style>
    <div class="popup-body">
        <h2 class="member-login"><span>Course Registration</span></h2>
        <h5 class="guest_screen_text top_heading">CANCER IN PETS - GET TO KNOW YOUR PET'S LUMPH NODES!</h5>
        <p class="guest_screen_text bottom_heading">Course Registration fee: <b>$20</b></p>
        <div class="align-content">
            <div class="row">
                <h5 class="spacing">*I am a:</h5>
                <select class="fields"><option>Select Profession</option></select>
            </div>
            <div class="row">
                <h5 class="spacing">*Email Address</h5>
            </div>
            <div class="row">
                <input class="emailField" type="email" placeholder="Enter email here">
            </div>
        </div>
        <div class="row namesClass">
            <div class="col-sm-6">
                <h5>*First Name</h5>
                <input type="text">
            </div>
            <div class="col-sm-6">
                <h5>*Last Name</h5>
                <input type="text">
            </div>
        </div>
        <div class="row align-content">
            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}">
            </div>
        </div>
    </div>
    <div class="popup-footer">
        <a id="continue_guest" type="button" class="toggle button send-msg">PAY $20</a>
        <div id="guest_continue_loading" style="display: none"><img src="{{ asset('/frontend/images/orangeLoading.gif')}}" width="40px" style="margin-left:10px;"></div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
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
                data: {guest_screen: 1},
                success: function(response){
                    $('#login_main_body').empty();
                    $('#login_main_body').append(response.html);
                }
            })
            }, 1000);;
        });
    </script>
