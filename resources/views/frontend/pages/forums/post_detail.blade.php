@extends('frontend.master')
@section('content')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
      <section class="video-section-wrapper mb-4">
         <div class="container">
            <section class="become_member_area">
                <div class="container">
                    <h2>
                        <span>{{$posts->post_title}}</span>
                    </h2>
                </div>
            </section>
            <section class="container">
                <div class="row mb-2">
                    <div class="col-sm-12 text-right">
                        <div class="icon_post">
                        <a href="{{ route('forums-posts.edit',$posts->id)}}" class="mx-2"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                        <a href="javascript:void(0);" onclick="deleteRecord('{{$posts->id}}', '/vetvine-member/forums-posts/')"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                    </div>
                    </div>
                </div>
        </section>
            <div class="public-detail-inner">
               <div class="public-cat">
                @if($posts->post_photo)
                <img src="{{ asset('/vetvineUsers/posts/'.$posts->post_photo ?? '')}} " alt="" id="user-image" height="100px">
               </div>
               @endif
               {{-- @if($posts->post_add_video)
               <div class="col-12">
                   <div class="video-box">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ asset('/vetvineUsers/videos/'.$posts->post_add_video)}}"allowfullscreen></iframe>
                      </div>
                    </div>
               </div>
               @endif --}}
               <p> @php echo $posts->post_description; @endphp</p>
               <div class="row">
                  <div class="col-md-6">
                     <h2>Leave A Comment </h2>
                     @include('frontend.pages.forums.replies', ['comments' => $posts->comments, 'post_id' => $posts->id])
                     <hr />
                     <form method="post" id="commentform" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group mt-2">
                            <input type="text" name="comment" id="comment" class="form-control my-2 comment_input">
                            <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_post my-2"id="comment_btn">Add Comment</button>
                        </div>
                    </form>
                     {{-- <form action="">
                     <input type="text" class="form-control my-2 comment_input">

                     <button class="btn_post my-2">Submit</button>
                  </form> --}}
                  </div>
               </div>
            </div>

      </section>
      @endsection
