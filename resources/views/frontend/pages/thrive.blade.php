@extends('frontend.master')
@section('content')
<main>
    <section class="main_banner main_banner_thrive">
      <!-- <div class="container">
        <div class="flex-box-banner">
          <div class="grow_banner_box grow_banner_box_web">
            <div class="grow-heading">THRIVE</div>
            <p class="mb-0">Rediscover your “why,” reconnect with your purpose, and achieve work-life balance.</p>
            <img src="img/sep-line-2.jpg" width="250" height="2" alt="">
          </div>
        </div>

      </div> -->
    </section>
  </main>

  <section class="main_banner_bottob_label"></section>

  <section class="become_member_area">
    <div class="container">
      <h2>
        <span class="heading_span">VETERINARY WELLNESS & RESILIENCY COACHING </span>
      </h2>
      <div class="row">

        <div class="col-sm-6 col-md-6">
        <iframe width="100%" height="330" src="https://www.youtube.com/embed/gXWiDNhvIpM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>

        <div class="col-sm-6 col-md-6">
          <img src="{{asset('frontend/images/BECOME-1.png')}}" alt="">
          <h3>Work Smart, Live Well </h3>
          <img src="{{asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p>orem ipsum dolor sit amet, consectetur adipiscing elit.
           Aliquam sagittis ullamcorper ante actu mollis. Nullam

           tincidunt nibh ac ligula auctor eleifend. Ut quis non leo
           hendrerit, scelerisque nisi ac, laoreet orci. Ut at auctor
           lacus. Nullam rhoncus ullamcorper turpis eget euismod.
           Morbi sed arcu odio. In a ultrices massa, enim.

           </p>

        </div>

      </div>
    </div>
  </section>
<section class="thrive_gray_area   become_member_area_bottom">
    <div class="container">

      <div class="row">
        <div class="col-sm-6 col-md-6 line_member_box thrive_box_leftbox">
          <h3>Who is This For?</h3>
          <img src="{{asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <h4 class="thrive_gray_margin">Donec vel ultrices sem, volutpat tincidunt tellus erat.
          Aliquam erat volutpat.Maecenas volutpat elementum.
          </h4>
          <p> Cras vulputate viverra urna. Vivamus non mauris velit.
          Cras nunc lorem, pellentesque nec tempor fermentum
          vel nisi. Integer ac dui hendrerit sem elementum lacinia.
          Cras posuere dolor sagittis tellus egestas non convallis
          neque ultrices. Proin accumsan leo quod non eget.

          </p>

        </div>
        <div class="col-sm-6 col-md-6 ptg_meber_rightbox">
          <h3>How Does it Work?</h3>
          <img src="{{asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <h4 class="thrive_gray_margin">Ut at auctor lacus. Nullam rhoncus ullamcorper turpis
          eget euismod. Morbi sed arcu odio. In a ultrices massa.
          </h4>
          <p class="margin_para_0"> Praesent a orci a ex rhoncus suscipit in vitae urna. Sed
          maximus varius tortor, vel convallis augue posuere quis.
          Mauris convallis ac nulla et tristique. Donec vel ultrices
          sem, volutpat tincidunt tellus. Aliquam erat volutpat.
          Maecenas volutpat tibulum eget tincidunt.

          </p>
        </div>
      </div>
    </div>
  </section>



  <section class="become_member_area ">
    <div class="container mb-5">

      <div class="row">

        <div class="col-sm-6 col-md-6 res_p_grow">

          <h3>About the Program</h3>
          <img src="{{asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="margin_bottom_anchor"> Cras vulputate viverra urna. Vivamus non mauris velit.
           Cras nunc lorem, pellentesque nec tempor fermentum
         vel nisi. Integer ac dui hendrerit sem elementum lacinia.
          Cras posuere dolor sagittis tellus egestas non convallis
            neque ultrices. Proin accumsan leo quod non eget.
            <br>
<br>
Nullam tincidunt nibh ac ligula auctor eleifend. Ut quis
leo hendrerit, scelerisque nisi actum, laoreet orci.
            </p>
          <a href="#" class="btn_join_thepet">LEARN MORE > </a>
        </div>
        <div class="col-sm-6 col-md-6">
               <div class="featured_video_img">PROGRAM PHOTO</div>
        </div>



      </div>

      <hr class="thrive_hr_mrg">

      <div class="row">
        <div class="col-sm-6 col-md-6">
               <div class="featured_video_img">COACHING PHOTO</div>
        </div>

        <div class="col-sm-6 col-md-6 res_p_grow">

          <h3>Coaching Options</h3>
          <img src="{{asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="margin_bottom_anchor"> Cras vulputate viverra urna. Vivamus non mauris velit.
            Cras nunc lorem, pellentesque nec tempor fermentum
            vel nisi. Integer ac dui hendrerit sem elementum lacinia.
            Cras posuere dolor sagittis tellus egestas non convallis
           neque ultrices. Proin accumsan leo quod non eget.
           <br>
<br>
Nullam tincidunt nibh ac ligula auctor eleifend. Ut quis
leo hendrerit, scelerisque nisi actum, laoreet orci.

           </p>
          <a href="#" class="btn_join_thepet">CONTACT US > </a>
        </div>




      </div>
    </div>
  </section>
@endsection
