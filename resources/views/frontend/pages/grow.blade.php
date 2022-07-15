@extends('frontend.master')
@section('content')

<main>
    <section class="main_banner main_banner_grow">
      <div class="container">
        <div class="flex-box-banner">
          <div class="grow_banner_box grow_banner_box_web">
            <div class="grow-heading">GROW</div>
            <img src="{{ asset('frontend/images/sep-line-2.jpg') }}" width="250" height="2" alt="" class="line_image">
            <p class="mb-0">Learn from world renowned animal experts to empower yourself and grow.
            </p>

          </div>
        </div>
      </div>
    </section>
  </main>

  <section class="main_banner_bottob_label"></section>

  <section class="become_member_area upcomming_wabinar">
    <div class="container">
      <h2>
        <span>UPCOMING WEBINARS</span>
      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img src="{{ asset('frontend/images/webinar-icon.png')}}" alt="" class="web_icon">
          <h3>Featured Webinar Title </h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="feature_para"> To be available for viewing On Demand. Cranial cruciate
            ligament rupture, similar to ACL tears in humans, is a
            common orthopedic injury in pet dogs. A tibial plateau
            leveling osteotomy (TPLO) is a common procedure
            performed to address stifle (knee) instability...</p>
          <a href="#" class="btn_join_thepet">SEE UPCOMING EVENTS > </a>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="feaatured_img">WEBINAR PHOTO</div>
        </div>
      </div>
    </div>
  </section>

  <section class="become_member_area">
    <div class="container">
      <h2>
        <span>CE / VIDEOS ON DEMAND</span>
      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6">
               <div class="featured_video_img">CE/VIDEO PHOTO</div>
        </div>
        <div class="col-sm-6 col-md-6 res_p_grow">
          <img src="{{ asset('frontend/images/featured-video-icon.png')}}" width="89" height="77" alt="" class="web_icon">
          <h3>Featured Video Title</h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="feature_para"> Gastric dilatation and volvulus (GDV), or bloat, is a
            common condition in large and giant breed dogs with
            an unacceptably high morbidity and mortality rate. Due
            to the importance of GDV in many dog breeds, several
            previous studies have investigated potential risk...</p>
          <a href="#" class="btn_join_thepet">WATCH MORE VIDEOS > </a>
        </div>

      </div>
    </div>
  </section>

  <section class="become_member_area become_member_area_bottom">
    <div class="container">
      <h2>
        <span>Educational Resources</span>
      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6 line_member_box">
          <h3>CERTIFICATE</h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          {{-- <p> Presented by: Quisque commodo quam ligula
            Sponsored by: Cras posuere dolor sagittis</p> --}}
            <p class="certificate_para">Our mission is to provide guidance, support,
                and wisdom to those who care for animals. <br> <br>
                Forum discussions on animal health and vet
                med trending topics are moderated by
                specialists and industry experts.</p>
          <a href="#" class="btn_join_thepet">LINK TEXT GOES HERE > </a>
        </div>
        <div class="col-sm-6 col-md-6 ptg_meber_rightbox">
          <h3>SPECIAL PROGRAMS </h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          {{-- <p> Presented by: Quisque commodo quam ligula
            Sponsored by: Cras posuere dolor sagittis</p> --}}
            <p class="special_para">Caregivers deserve reassurance that they are doing what is
                best for the animals in their care. Empower yourself with
                trusted, expert-driven information. <br>
                <br>
                Our articles on pet health diseases and conditions help
                caregivers make informed decisions and provide the best
                life for animals.</p>
          <a href="#" class="btn_join_thepet">LINK TEXT GOES HERE ></a>
        </div>
      </div>
    </div>
  </section>

@endsection
