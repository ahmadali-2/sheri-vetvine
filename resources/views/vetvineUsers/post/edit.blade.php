@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
    <div class="dashboard-content-wrapper">
        <h4>Edit Post</h4>
        <br>
        <form action="{{ route('post.update', $post->id) }}" method="post" id="createpost" novalidate="novalidate"

            enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="post_title" class="control-label mb-1">Post Title</label>
                        <input id="post_title" placeholder="Enter Title" name="post_title"
                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                            value="{{ $post->post_title }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="post_photo" class="control-label mb-1">Add Photo</label>
                        <input id="post_photo" placeholder="" name="post_photo"
                            type="file" class="form-control" aria-required="true" aria-invalid="false"
                            value="{{ $post->post_photo }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="forum_description" class="control-label mb-1">Post
                            Description</label>
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
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary mt-3" value="POST">
                </div>
            </div>
        </form>
    </div>
@endsection

