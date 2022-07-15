@extends('frontend.master')
@section('content')
<style>
    #createpost input,#createpost textarea , .textarea_border{
        border: 2px solid #5c7c85 !important;

    }
    #createpost .edit_post_btn{
    border: none !important;
    border-radius: 0px;
    background: #f27222;
    outline: none;
}
#createpost .edit_post_btn:hover{
    background: transparent;
    border: 2px solid #f27222 !important;
    color:#f27222;
}
</style>
<section class="main_banner_bottob_label"></section>
<section class="become_member_area">
    <div class="container">
        <h2>
            <span>Edit Post
            </span>
        </h2>
    </div>
</section>
<section>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('forums-posts.update',$post->id)}}" method="post" id="createpost" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="forum_id" value="{{$post->forum_id}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="post_title" class="control-label mb-1">Post Title</label>
                                    <input id="post_title" placeholder="Enter Title" name="post_title"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        value="{{ $post->post_title }}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="forum_description" class="control-label mb-1">Post
                                    Description</label>
                                <div class="form-group textarea_border">

                                    <textarea class="form-control ckeditor" id="description" rows="3" name="description" value="{{ $post->post_description }}">{{ $post->post_description }}</textarea>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="post_link" class="control-label mb-1">Add Link</label>
                                        <input id="post_link" placeholder="" name="post_link"
                                            type="url" class="form-control" aria-required="true" aria-invalid="false"
                                            value="{{ $post->post_link }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="post_add_video" class="control-label mb-1">Add Video</label>
                                        <input id="post_add_video" placeholder="" name="post_add_video"
                                            type="file" class="form-control" aria-required="true" aria-invalid="false"
                                            value="{{ $post->post_add_video }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="    display: flex;
                                    flex-direction: column;">
                                        <img src="@if($post->post_photo) {{ asset('/vetvineUsers/posts/'.$post->post_photo)}} @else {{asset('frontend/images/thumbnail.jfif')}} @endif" alt="" id="post-image" style="height: 250px;">
                                        <button type="button" class="btn btn-dark mt-3" onclick="document.getElementById('post_photo').click()">Choose File</button>
                                        <input type="file" style="visibility:hidden" name="post_photo" id="post_photo" onchange="document.getElementById('post-image').src = window.URL.createObjectURL(this.files[0])">
                                        {{-- <label for="post_photo" class="control-label mb-1">Add Photo</label>
                                        <input id="post_photo" placeholder="" name="post_photo"
                                            type="file" class="form-control" aria-required="true" aria-invalid="false"
                                            value="{{ $post->post_photo }}"> --}}
                                    </div>
                                </div>
                            </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary mt-3 edit_post_btn" value="UPDATE">
                        </div>
                    </form>
                </div>
             </div>
    </div>
    <div style="height: 50px;"></div>
</section>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\VetvineUsers\PostManagement\CreatePostManageRequest', '#createpost') !!}
@endsection
