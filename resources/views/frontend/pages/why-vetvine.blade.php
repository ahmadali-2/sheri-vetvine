@extends('frontend.master')
@section('content')

<main>
    <section class="main_banner main_banner_grow why-vetvine">
      <div class="container">
        <div class="flex-box-banner">
          <div class="grow_banner_box grow_banner_box_web">
            <div class="grow-heading">WHY VETVINE?</div> <img src="{{ asset('frontend/images/sep-line-2.jpg') }}" width="250" height="2" alt="" class="line_image">
            <p>We believe that maximizing the life and longevity of animals, in turn, enriches the lives of those who care for them.
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <section class="main_banner_bottob_label"></section>

  <section class="become_member_area mb-4">
    <div class="container">
      <h2 class="Our-maanifesto">
        <span>Our Manifesto
        </span>
      </h2>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <p class="margin_bottom_para">We humans use the word “pet” far too casually.
            There are few words as short, that mean as much.
            Pets are friends, our furry, scaly, winged animal
            companions; our true companions, our BFF’s.
          </p>
          <p class="margin_bottom_para">
            They help us celebrate the good days.
            And rescue us from the bad.
            They listen as long as we want to talk.
            And won’t tell a soul.
          </p>
          <p class="margin_bottom_para">They treat us better than most of the people we know. <br>
            Pets are our most reliable source of comfort, support,
            and unconditional love.
          </p>
          <p class="margin_bottom_para">
            They trust us. They believe in us.
            <br>
            They’re always on our side.
            <br>
            Pets fill voids we don’t even know we have.
          </p>
          <p>
            In fact, we cannot imagine a world without them.
          </p>
        </div>
        <div class="col-sm-6 col-md-6">
          <p class="margin_bottom_para">They leave a mark on our hearts that’s felt long afterthey’re gone.
          </p>
          <p class="margin_bottom_para">
            At VetVine<sup>®</sup>, our mission is to provide the guidance, support, and wisdom needed to help
            keep those animals, and the people who care for them, healthy and happy no matter what they’re going
            through.
          </p>
          <p>
          </p>
          <p class="margin_bottom_para">
            Because, when they’re in pain, we’re in pain.
             </p>
          <p class="margin_bottom_para"> After all, we’re better humans for having animals in our lives.</p>
          <p> And because they’re always here for us, we’re always here for them.</p>
        </div>
      </div>
    </div>
  </section>

  @endsection
