@extends('frontend.master')
@section('content')
    <main>
        <section class="Section_top">
            <div class="container">
                <div class="flex-box-banner">
                    <div class="grow_banner_box grow_banner_box_web home_box">
                        <div class="grow-heading">
                            <!-- </div> <img src="img/sep-line-2.jpg" width="250" height="2" alt="" class="line_image"> -->

                            <p> A better life for animals and the humans <br> who care for them.</p>

                            <div class="line"></div>
                            <a href="{{ route('why_vetvine') }}" class="btn btn-warning home_banner_btn">WHY VETVINE?</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        path = "{{route('verifyEmailPopup')}}";
        window.location.href = path;
    </script>
@endsection
