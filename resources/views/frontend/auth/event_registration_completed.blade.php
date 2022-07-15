<style>
    .guest_screen_text {
        padding: 10px;
        padding-top: 20px;
        text-align: center;
    }
    .top_heading {
        color: '#577E80';
    }
    .bottom_heading {
        color: 'black';
    }
    .color_theme {
        color: #f27222;
    }
</style>
<div class="popup-body">
    <h2 class="member-login"><span>Course Registration</span></h2>
    <h2 class="mt-5" style="border-bottom: none !important;">Completed</h2>

    <div class="loading" ><img id="guest_continue_loading" style="display: none;" src="{{ asset('/frontend/images/orangeLoading.gif') }}"
            width="40px" style="margin-left:10px;"></div>
    <h3 class="guest_screen_text top_heading">CANCER IN PETS - GET TO KNOW YOUR PET'S LUMPH NODES!</h3>
    <h5>We just sent an email confirming your registration as well as additional details about this event to
        ****@***.com</h5>
    <p>Don't recieve an email from us ? check you SPAM folder, still can't find it ? Need help or having trouble ? <a
            href="#"><u>Contact Us</u></a></p>
</div>
<div class="popup-footer">
    <a id="continue_guest" type="submit" class="btn button add_to_calender_btn"><i class="fas fa-calendar-check"></i> Add to Calendar</a>
</div>
<div class="popup-footer mt-2">
    <a class="color_theme" href="#"><u>Close this Window</u></a>
</div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#continue_guest').on('click', function() {
        $('#guest_continue_loading').css('display', 'block');
        setTimeout(
        function()
        {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "GET",
            url: '/next-guest-screen',
            data: {guest_screen: 6},
            success: function(response){
                $('#login_main_body').empty();
                $('#login_main_body').append(response.html);
            }
        })
        }, 1000);
    });
</script>
