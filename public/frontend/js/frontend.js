$(document).on('click', '.droplink1', function(event) {
    event.preventDefault();
    $('.subdrop1').toggleClass('show-menu');
    $('.subdrop2').removeClass('show-menu');
    $('.subdrop3').removeClass('show-menu');

});
$(document).on('click', '.droplink2', function(event) {
    event.preventDefault();
    $('.subdrop2').toggleClass('show-menu');
    $('.subdrop1').removeClass('show-menu');
});
$(document).on('click', '.droplink3', function(event) {
    event.preventDefault();
    $('.subdrop3').toggleClass('show-menu');
    $('.subdrop2').removeClass('show-menu');
    $('.subdrop1').removeClass('show-menu');
});

$(document).ready(function(e) {
    $('.Register-Now').click(function() {
        $('#login-modal').hide();
        $(".modal-backdrop").hide();
    });


    $(".tab_1_section_parent").on("click", function(e) {



        $('.tab_2_section').removeClass("active_box");
        $('.tab_3_section').removeClass("active_box");
        $('.tab_4_section').removeClass("active_box");
        $(".ui-tabs-nav li").removeClass('ui-tabs-active');
        $(this).addClass('ui-tabs-active');
        $('.tab_1_section').toggleClass('active_box');


    });

    $(".tab_2_section_parent").on("click", function(e) {
        $('.tab_1_section').removeClass('active_box');
        $('.tab_3_section').removeClass('active_box');
        $('.tab_4_section').removeClass('active_box');
        $(".ui-tabs-nav li").removeClass('ui-tabs-active');
        $(this).addClass('ui-tabs-active');

        $('.tab_2_section').toggleClass('active_box');
    });
    $(".tab_3_section_parent").on("click", function(e) {
        $('.tab_1_section').removeClass('active_box');
        $('.tab_2_section').removeClass('active_box');
        $('.tab_4_section').removeClass('active_box');
        $(".ui-tabs-nav li").removeClass('ui-tabs-active');
        $(this).addClass('ui-tabs-active');
        $('.tab_3_section').toggleClass('active_box');

    });
    $(".tab_4_section_parent").on("click", function(e) {
        $('.tab_1_section').removeClass("active_box");
        $('.tab_2_section').removeClass("active_box");
        $('.tab_3_section').removeClass("active_box");

        $(".ui-tabs-nav li").removeClass('ui-tabs-active');
        $(this).addClass('ui-tabs-active');
        $('.tab_4_section').toggleClass('active_box');

    });
    $(".input_click").on('click', function(e) {
        $('.tab_1_section').removeClass('active_box');
        $('.tab_2_section').removeClass('active_box');
        $('.tab_3_section').removeClass('active_box');
        $('.tab_4_section').removeClass('active_box');
    });
    $(".form-check-input").on('checked', function() {

        $('.tab_1_section').removeClass('active_box');
        $('.tab_2_section').removeClass('active_box');
        $('.tab_3_section').removeClass('active_box');
        $('.tab_4_section').removeClass('active_box');
    });

    $(".form-check-label").on('click', function() {

        $('.tab_1_section').removeClass('active_box');
        $('.tab_2_section').removeClass('active_box');
        $('.tab_3_section').removeClass('active_box');
        $('.tab_4_section').removeClass('active_box');
    });
    $(".form-vet-section").on('click', function() {
        $('.tab_1_section').removeClass('active_box');
        $('.tab_2_section').removeClass('active_box');
        $('.tab_3_section').removeClass('active_box');
        $('.tab_4_section').removeClass('active_box');
    });


    $(".remove_box").on("click",function(e){

        $(".registraion_form_pop_up").find('.active_li').removeClass('active_li');
         $(this).closest('.form-check').addClass('active_li');

});







 $("#login_form_show").on("click",function(e){
    e.preventDefault();
    $('#register_modal_close').trigger("click");
    $('#login_form_show_btn').trigger("click");
 })
 $("#register_model_show").on("click",function(e){
     e.preventDefault();
     localStorage.setItem('guestLogin', false);
     console.log(localStorage.getItem('guestLogin'));
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
    });
    //  $("#registration_modal_box_show_btn").trigger("click");
    $('#login_form_show_btn').trigger("click");
 })
 $("#register_show_modal_login").on("click",function(e){
     e.preventDefault();
     $("#registration_modal_box_show_btn").trigger("click");
     $("#email_verify_modal_close").trigger("click");
 })
})



// Frontend dashboard scripts start



$(document).ready(function() {

    //side nav toggle button hide/show
    $("#aside-toggle-btn").click(function() {
        $("#aside-nav, main").toggleClass("active");
    });

    //aside nav dropdown caret icon rotate
    $("#aside-nav-ul .nav-link").click(function() {
        $(this).find(".dropdown-caret-svg").toggleClass("rotate-svg");
    });

    //aside nav > nav link remove/add active class on click
    $("#aside-nav-ul .nav-link").click(function() {
        $("#aside-nav-ul .nav-link").removeClass("active");
        $(this).addClass("active");
    });

    //click on one dropdown second one automatically hide and change svg icon to
    $("#aside-nav-ul").on("click", ".nav-item", function() {
        const liElement = $(this);
        liElement
            .siblings()
            .children()
            .children(".dropdown-caret-svg")
            .removeClass("rotate-svg");
        liElement
            .siblings()
            .children(".aside-dropdown-menu")
            .removeClass("show");
        if ($(this).hasClass("active")) {
            liElement
                .siblings()
                .children(".aside-dropdown-menu")
                .addClass("show");
        }
    });

    if ($(window).width() <= 767) {
        $("#aside-toggle-btn").click(function() {

            $("#aside-nav").toggle();
        });
        $("#times").click(function() {
            $("#aside-nav").toggle();
        });
    }
});


/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
// front end delete modal
const deleteRecord = (id, uri) => {
    document.getElementById('identity').value ;
    let route = window.location.origin + uri + id;
    document.getElementById('deleteForm').setAttribute('action', route)
    $('#deleteModal').modal('show')
}
