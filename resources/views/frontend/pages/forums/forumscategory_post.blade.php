@extends('frontend.master')
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('frontend/forums/css/style.css') }}" />
    <style>
        .forum_table button{
            background: transparent !important
        }
    </style>
@endsection
@section('content')
    <main>
        <section class="main_banner  forum_bg">
            <div class="container">
                <div class="flex-box-banner">
                    <div class="grow_banner_box grow_banner_box_web">
                        <div class="grow-heading">Forum </div>
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

    <section class="become_member_area">
        <div class="container">
            <h2>
                <span id="post_top_div">Forums Posts
                </span>
            </h2>
        </div>
    </section>

    {{-- <section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</section> --}}
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="filter-div category-div forum_category_div">
                        <div id="fav_show_wrapper">
                            <label for="fav_Show" id="fav_show_label">Category</label>
                            <select name="fav_Show" id="form_search_dropdown" class="filter-slect border select-m">
                                <option title="" value="0" label="Select Forum"></option>
                                @foreach($forums as $forum)
                                    @if($forum->id == $forumId)
                                        <option title="{{$forum->forum_title}}" value="{{$forum->id}}" label="{{$forum->forum_title}}" selected>{{$forum->forum_title}}</option>
                                    @else
                                        <option title="{{$forum->forum_title}}" value="{{$forum->id}}" label="{{$forum->forum_title}}">{{$forum->forum_title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            <div class="col-md-4 col-lg-3 search_filter  search_bottom">
                <label for="">Search </label>
                <div class="input-group">
                       <input type="text" id="form_search_field" class="form-control top-search" placeholder="Search forum post" aria-label="Recipient's username" aria-describedby="basic-addon2">

                       <div class="input-group-append">

                           <button class="btn search_btn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>

                       </div>

                   </div>
                {{-- <div class="form-group">
                    <label for="" style="visibility:hidden ;">dd</label>
                    <input  type="text" placeholder="🔍 Search Here ....." class="form-control search_forum">
                </div> --}}

            </div>
            @auth
                <div class="col-md-4 col-lg-3 ml-auto text-right ">
                    <a class="btn btn-primary post_btn " href="{{ route('createforumpost',$forumId ) }}">
                        Create Post
                    </a>
                </div>
            @endauth
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                     <table class="table  forum_table table-bordered" id="form_posts_view_table">
                         <thead>
                             <tr>
                                 <th class="title_th" width="50%"></th>
                                 <th><img src="{{ asset('frontend/forums/img/message.png')}}" alt="behavior img"></th>
                                 <th><img src="{{ asset('frontend/forums/img/heart.png') }}" alt=""></th>
                                 <th><img src="{{ asset('frontend/forums/img/view.png') }}" alt=""></th>
                                 <th class="recent_activity">Recent Activity</th>

                             </tr>
                         </thead>


                        {{-- start loop  --}}
                    {{-- @dd($forums) --}}

                    <tbody id="form_posts_render">
                        @include('frontend.pages.forums.form_posts_view')
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
                scrollTop: $('#post_top_div').offset().top
            }, 'slow');
        });
        var originalFormId = '<?php echo $forumId ?>';

        $('#form_search_dropdown').on('change',function(){
            filterForm();
        });

        $('#form_search_field').on('keyup',function(){
            filterForm();
        });

        function filterForm(){
            var form = $('#form_search_dropdown').val();
            var form_search_field = $('#form_search_field').val();

			$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			type: "POST",
			url: '/search-form-post',
			data: {form: form, title_text: form_search_field, originalFormId: originalFormId},
			success: function(response){
                $('#formPostDiv').remove();
                $('#form_posts_render').empty();
                $('#form_posts_render').append(response.html);
                $('#commentajax').empty();
                $('#commentajax').append(response.count);
                $('#countajax').empty();
                $('#countajax').append(response.count);
			}
			});
        }
</script>
@endsection




