@extends('frontend.master')
@section('content')
    <style>
        .display-comment .display-comment {
            margin-left: 40px
        }
    </style>
    <section class="main_banner_bottob_label"></section>
    <section class="become_member_area">
        <div class="container">
            <h2>
                <span>{{ $posts->post_title }}</span>
            </h2>
        </div>
    </section>
    <section class="container">
        <div class="row mb-2">
            <div class="col-sm-12 text-right">
                <a class="btn btn-primary" href="{{ route('forums-posts.edit', $posts->id) }}">Edit</a>
                <a href="javascript:void(0);" class="btn btn-primary"
                    onclick="deleteRecord('{{ $posts->id }}', '/vetvine-member/forums-posts/')">Delete</a>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 mt-2 mb-2">
                    @php echo $posts->post_description; @endphp
                </div>
            </div>
            <div class="row">
                @if ($posts->post_photo)
                    <div class="col-6">
                        <img src="{{ asset('/vetvineUsers/posts/' . $posts->post_photo) }} " alt="" id="user-image"
                            height="100px">
                    </div>
                @endif
                @if ($posts->post_add_video)
                    <div class="col-6">
                        <div class="video-box">
                            <iframe src=" {{ asset('/vetvineUsers/videos/' . $posts->post_add_video) }} " alt="" id=""
                                height="200px" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <h5>Comments</h5>
                @include('frontend.pages.forums.replies', [
                    'comments' => $posts->comments,
                    'post_id' => $posts->id,
                ])
                <hr />
            </div>
            <div class="card-body ">
                <h5>Leave a comment</h5>
                <form method="post" id="commentform" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group mt-2">
                        <input type="text" name="comment" id="comment" class="form-control"
                            style="border: 1px solid #ced4da !important;" />
                        <span class="asteric" id="error1"></span>
                        <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="comment_btn">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 50px;"></div>
    </section>
@endsection
