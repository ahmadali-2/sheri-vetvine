<style>
.guest_screen_text{
    padding: 10px;
    padding-top: 20px;
    text-align: center;
}
.guest_button{

}
.top_heading{
    color: '#577E80';
}
.bottom_heading{
    color: 'black';
}
</style>
<div class="popup-body">
    <form id="event_detail_submit">
        <input id="event_detail_event_id" type="text" name="event_id" hidden>
        <input id="event_detail_user_id" type="text" name="user_id" hidden>
        <input id="event_detail_amount" type="text" name="event_price" hidden>
        <input id="event_detail_title" type="text" name="event_title" hidden>
    </form>
    <h2 class="member-login"><span>Course Registration</span></h2>
    <h5 class="guest_screen_text top_heading" id="event_detail_heading"></h5>
    <p class="guest_screen_text bottom_heading" id="event_protocol_heading"></p>
    <p class="guest_screen_text">Sign me up for this Course!</p>
</div>
<div class="popup-footer">
    <a id="pay_event_price" type="button" class="toggle button send-msg">Submit</a>
    <div id="guest_continue_loading" style="display: none"><img src="{{ asset('/frontend/images/orangeLoading.gif')}}" width="40px" style="margin-left:10px;"></div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#pay_event_price').on('click', function(){
        $('#guest_continue_loading').css('display','block');
        var formData = $('#event_detail_submit').serialize();
        formData+= '&guest_screen=3';
        setTimeout(
        function()
        {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "GET",
            url: '/next-guest-screen',
            data: formData,
            success: function(response){
                if(response.refresh){
                    location.reload();
                }else{
                    $('#login_main_body').empty();
                    $('#login_main_body').append(response.html);
                }
            }
        })
        }, 1000);
    });
</script>
