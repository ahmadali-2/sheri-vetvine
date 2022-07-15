<section class="footer_bg">



<div class="col-md-12">

  <div class="text-center social-icon pt-4 pb-3">



    <a href="#"><i class="fab fa-facebook-f"></i>



      </i></a>



    <a href="#"><i class="fab fa-twitter"></i>



      </i></a>

    <a href="#"> <i class="fab fa-linkedin-in"></i>



      </i></a>

    <a href="#"> <i class="fab fa-youtube"></i>



    </a>

    <hr class="bottom-line mx-auto">



  </div>

</div>



<div class="container">



  <div class="space">

    <div class="w3-col l1 m1 s1 w3-left-align one">

      <h3>About</h3>

      <ul class="p-0 mrg_top30_f">

        <li><a href="#">Why VetVine?</a></li>

        <li><a href="#">Membership</a></li>

        <li><a href="#">Privacy Policy </a></li>

        <li><a href="#">Terms of Service </a></li>

      </ul>





    </div>

    <div class="w3-col l1 m1 s1 w3-left-align one">



      <h3>Continuing Education</h3>

      <ul class="p-0">

        <li><a href="#">Upcoming Webinars</a></li>

        <li><a href="#">CE/Videos On Demand</a></li>

        <li><a href="#">Certificate & Special Programs</a></li>

        <li><a href="{{route('forumsfrontend')}}">Forums </a></li>
        <li><a href="{{route('newsfrontend')}}">News</a></li>

      </ul>

    </div>

    <div class="w3-col l1 m1 s1 w3-left-align one">



      <h3>Pet Loss <br>

        Support</h3>

      <ul class="p-0">

        <li><a href="#">About Pet Loss Support</a></li>

        <li><a href="#">Schedule & Registration</a></li>

        <li><a href="#">Group & Session Facilitators </a></li>

        <li><a href="#">Additional Resources </a></li>

        <li><a href="#">Pet loss & Grief Resources </a></li>

      </ul>

    </div>

    <div class="w3-col l1 m1 s1 w3-left-align one">



      <h3>Wellness for Professionals</h3>

      <ul class="p-0">

        <li><a href="#">Wellness Coaching for Professionals</a></li>

        <li><a href="#">Wellness Wisdom</a></li>



      </ul>

    </div>



    <div class=" w3-col l1 m1 s1 w3-left-align one">



      <h3>Pet Owner Resources</h3>

      <ul class="p-0">



        <li><a href="#">Upcoming Webinars</a></li>

        <li><a href="#">Webinars On Demand</a></li>

        <li><a href="#">Pet Health Articles</a></li>

      </ul>

    </div>

    <div class=" w3-col l1 m1 s1 w3-left-align one">



      <h3>Contact</h3>

    </div>



  </div>







  <div class="text-center all-right pt-5 pb-2 footer_bottom_mrg">

    <h4>PetsVetSpace, LLC ©2022. All Rights Reserved.</h4>

    <p class="deepfooter2">Designed &amp; Developed by <a href="https://leadconcept.com/" target="_blank" class="">LEADconcpet</a></p>

  </div>

</div>

</section>

<!-- footer end  -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{asset('bootstrap/jquery/popper.min.js')}}"></script>



<script src="{{ asset('frontend/js/bootstrap.js')}}"></script>

<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>



<script src="https://kit.fontawesome.com/b8867474d2.js" crossorigin="anonymous"></script>

<script src="{{ asset('frontend/js/fontawesome.js')}}"></script>

<script src="{{ asset('frontend/js/frontend.js')}}"></script>

<script src="{{ asset('vendor/select2/dist/js/select2.min.js')}}"></script>



<script>

$(document).ready(function() {

  $(".js-example-basic-multiple").select2();

});

</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
{!! JsValidator::formRequest('App\Http\Requests\VetvineUsers\PostManagement\CreatePostManageRequest','#createpost') !!}



@toastr_js

@toastr_render

@notifyJs

    <x:notify-messages />

