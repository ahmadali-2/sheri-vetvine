@extends('frontend.master')
@section('content')
<style>
    #createpost input,#createpost textarea{
        /* border: 2px solid #5c7c85  !important; */
        border-radius: 0px !important;
        /* color: #fff; */
    }
    .text_editor{
        border: 2px solid #5c7c85  !important;
        border-radius: 0px !important;
    }
    #createpost .post_submit_btn{
        background:  #f27222  !important;
         color: #fff;
        border: none !important;
        font-family: "Museo Sans 500";
        width: 143px;
    height: 37px;
    border-radius: 12px !important;
    transition: 0.3s all;
    }


    #createpost .post_submit_btn:hover {
    background: transparent !important;
    border: 2px solid #f27222 !important;
    color: #f27222;

}
</style>
<section class="main_banner_bottob_label"></section>
<section class="become_member_area">
    <div class="container">
        <h2>
            <span>Post
            </span>
        </h2>
    </div>
</section>
<section>
    <div class="container">
            <div class="row">
                <div class="col-lg-12"">
                    <form action="{{ route('forums-posts.store') }}" method="post" enctype="multipart/form-data" id="createpost">
                        @csrf
                        <input type="hidden" name="forum_id" value="{{$forum->id}}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="post_title" class="control-label mb-1">Post Title</label>
                                    <input id="post_title" placeholder="Enter Title" name="post_title"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="post_photo" class="control-label mb-1">Add Photo</label>
                                    <input id="post_photo" placeholder="" name="post_photo"
                                        type="file" class="form-control" aria-required="true" aria-invalid="false"
                                        value="">
                                </div>
                            </div>
                        </div>
                          <div class="row">

                            <div class="col-12">
                                <label for="forum_description" class="control-label mb-1">Post
                                    Description</label>
                                <div class="form-group text_editor">

                                    <textarea class="form-control ckeditor" id="description" rows="3" name="description" value=""></textarea>
                                </div>
                            </div>
                          </div>
                              <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="post_link" class="control-label mb-1">Add Link</label>
                                        <input id="post_link" placeholder="" name="post_link"
                                            type="url" class="form-control" aria-required="true" aria-invalid="false"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="post_add_video" class="control-label mb-1">Add Video</label>
                                        <input id="post_add_video" placeholder="" name="post_add_video"
                                            type="file" class="form-control" aria-required="true" aria-invalid="false"
                                            value="">
                                    </div>
                                </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12 ml-auto text-right">

                                <div class="form-group text-center">
                                    <input type="submit" class=" mt-3 post_submit_btn" value="ADD POST">
                                </div>
                              </div>
                          </div>
                    </form>
                </div>
            </div>
    </div>
    <div style="height: 50px;"></div>
</section>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\VetvineUsers\PostManagement\CreatePostManageRequest','#createpost') !!}
@endsection
