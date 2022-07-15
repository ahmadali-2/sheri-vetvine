@extends('frontend.master')
@section('content')
<main>
    <section class="main_banner heal_banner_box_web ">
      <div class="container">
        <div class="flex-box-banner">
          <div class="grow_banner_box grow_banner_box_web">
            <div class="grow-heading">HEAL
            </div> <img src="{{ asset('frontend/images/sep-line-2.jpg')}}" width="250" height="2" alt="" class="line_image">

            <p>Honor that special animal and friend
              who left a forever mark on your heart.</p>
          </div>
        </div>

      </div>
    </section>
  </main>

  <section class="main_banner_bottob_label"></section>

  <section class="become_member_area">
    <div class="container">
      <h2 class="pet-loss-text">
        <span>PET LOSS SUPPORT SERVICES</span>
      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-5">
          <img src="{{ asset('frontend/images/heal-icon-2.png')}}" alt="">
          <h3>Losing an Animal Companion </h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="margin_bottom_para">Animals are often our most reliable source of comfort, support, and unconditional love. We
            cannot imagine a world without them.

            </p>
            <p class="margin_bottom_anchor">
             <b itemprop="headline"> The VetVine<sup>®</sup>  Virtual Pet Loss Support</b> service was established to support people grieving the loss of an animal in their life - whether due to the death of a pet or loss of a relationship with an animal of any kind due to any circumstance. We offer a safe space where they can honor that special animal and friend - free of judgment - and be guided in how to navigate through various aspects of pet grief.


            </p>
          <a href="#" class="btn_join_thepet">READ MORE & REGISTER > </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-7">
          <img src="{{ asset('frontend/images/frame-heal.png')}}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <section class="become_member_area">
    <div class="container">
      <h2>

      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img src="{{ asset('frontend/images/heal-video-frame.png')}}" alt="" width="95%" />
        </div>
        <div class="col-sm-6 col-md-6 res_p_grow">
          <img src="{{ asset('frontend/images/heal-icon-1.png')}}" alt="" class="web_icon_bottom">
          <h3>Getting Pet Loss Support</h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg')}}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="margin_bottom_para">Our session Facilitators are compassionate and experienced professionals in pet loss and grief support. They serve to guide conversations, offer suggestions for navigating through grief, and help those who've lost a special animal discover and make meaning of the loss.
          </p>
          <p class="margin_bottom_anchor">
            Join us and participate on a pay-per-session basis or compliments of your veterinary or pet care provider with a valid Gift Certificate or Coupon Code. We offer one-to-one (individual) as well as Group (for 2 to 5 persons) Support sessions. Gift Certificates are available for purchase.
          </p>
          <a href="#" class="btn_join_thepet" data-toggle="modal" data-target="#Registration-modal">READ MORE & REGISTER > </a>
        </div>

      </div>
    </div>
  </section>
  <section class="become_member_area">
    <div class="container">
      <h2>

      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img src="{{ asset('frontend/images/horse-icon.png')}}" alt="horse" >
          <h3>Testimonials </h3>
          <img src="{{ asset('frontend/images/sep-line-3.jpg') }}" width="150" height="2" class="mrargine_sep_line" alt="">
          <p class="margin_bottom_para">"... Excellent facilitator and I enjoyed the peer group process. I was able to share the stories of the
            love for my pet and grief and guilt over her death in a safe and non-judgmental environment. I will return
            for another session." - November 10, 2021</p>
          <p class="margin_bottom_anchor">- "When I attended VetVine’s Group Support session I had been without Georgie for about 7 months.
            Georgie was my absolute soul mate. A piece of me genuinely died when we had to say goodbye.Georgie was my
            absolute soul mate. A piece of me genuinely died when we had to say goodbye. When I first lost him, I was
            outwardly mourning for months and turned completely inward. I found myself consciously blocking my thoughts
            and memories of my sweet boy because it was interrupting my daily life so significantly. - November 10, 2021
          </p>
          <a href="add-testimonial.html" class="btn_join_thepet">READ MORE > </a>
        </div>
        <div class="col-sm-6 col-md-6">
          <img src="{{ asset('frontend/images/animals-more.png')}}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

@endsection
