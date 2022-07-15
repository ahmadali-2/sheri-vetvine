@extends('frontend.master')
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('frontend/forums/css/style.css') }}" />
@endsection
@section('content')
    <main>
        <section class="main_banner  forum_bg">
            <div class="container">
                <div class="flex-box-banner">
                    <div class="grow_banner_box grow_banner_box_web">
                        <div class="grow-heading">Forum</div>
                        <img src="{{ asset('frontend/forums/img/sep-line-2.jpg') }}" width="250" height="2" alt=""
                            class="line_image">
                        <p class="mb-0">Guidance, support and wisdom to benefit and maximize the life and
                            longevity of animals.
                        </p>

                    </div>
                </div>
            </div>
        </section>
    </main>
{{-- @dd($forums) --}}
    {{-- ============================================================================ --}}
    {{-- NEW FORUMS SECTION --}}
    <section class="main_banner_bottob_label"></section>

    <section class="become_member_area" id="">
        <div class="container">
            <h2>
                <span id="form-special-topics">Forums
                </span>
            </h2>
        </div>
    </section>


    <section>
        <div class="specialty-topics">
            <div class="container forum_top_section">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3" style="padding-top: 16px;">
                        <div class="filter-div category-div">
                            <div id="fav_show_wrapper show-d">
                                <select name="form_search_dropdown" id="form_search_dropdown" class="filter-slect border select-m">
                                    <option title="" value="0" label="Select Category"></option>
                                    @foreach($categories as $category)
                                        @if($category->id == $categoryId)
                                            <option title="{{$category->category_title}}" value="{{$category->id}}" label="{{$category->category_title}}" selected>{{$category->category_title}}</option>
                                        @else
                                            <option title="{{$category->category_title}}" value="{{$category->id}}" label="{{$category->category_title}}">{{$category->category_title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        {{-- <div class="form-group">
                            <input  type="text" placeholder="🔍 Search Here ....." class="form-control search_forum">
                        </div> --}}

                        <div class="input-group">

                         {{-- <label for="">Search </label> --}}

                            <input id="form_search_field" placeholder="Search Forum" type="text" class="form-control top-search" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">

                            <div class="input-group-append">

                                <button class="btn search_btn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-sm-12">



                     <table class="table  forum_table table-bordered" >
                         <thead>
                             <tr>
                                 <th class="title_th" width="50%"></th>
                                 <th><img src="{{ asset('frontend/forums/img/message.png')}}" alt="behavior img"></th>
                                 <th><img src="{{ asset('frontend/forums/img/heart.png') }}" alt=""></th>
                                 <th><img src="{{ asset('frontend/forums/img/view.png') }}" alt=""></th>
                                 <th class="recent_activity text-capitalize">Recent Activity</th>

                             </tr>
                         </thead>






            {{-- start loop  --}}
        {{-- @dd($forums) --}}

        <tbody id="render-category-form-table">
            @include('frontend.pages.forums.category_wise_form')
        </tbody>
    </table>




            {{-- end loop row  --}}

        </div>
    </div>
</div>

    </section>
    @endsection

    @section('scripts')
    <script>
        $(document).ready(function () {
            // Handler for .ready() called.
            $('html, body').animate({
                scrollTop: $('#form-special-topics').offset().top
            }, 'slow');
        });
        var originalCategoryId = '<?php echo $categoryId ?>';

        $('#form_search_dropdown').on('change',function(){
            filterForm();
        });

        $('#form_search_field').on('keyup',function(){
            filterForm();
        });

        function filterForm(){
            var category = $('#form_search_dropdown').val();
            var category_search_field = $('#form_search_field').val();

			$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			type: "POST",
			url: '/search-category-form',
			data: {category: category, title_text: category_search_field, originalCategoryId: originalCategoryId},
			success: function(response){
                if($('#category_wise_notFound').length){
                    $('#category_wise_notFound').remove();
                }
                $('#render-category-form-table').empty();
                $('#render-category-form-table').append(response.html);
			}
			});
        }
</script>

@endsection
