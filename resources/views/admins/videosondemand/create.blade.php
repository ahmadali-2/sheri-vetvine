@extends('admins.master')
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Videos</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <form action="{{ route('videos-on-demand.store') }}" method="post" enctype="multipart/form-data"
                            id="videosform" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Select Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="" selected disabled>Select Category</option>
                                            @forelse ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_title }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Select Sponsor</label>
                                        <select id="sponser_id" style="width: 100%" name="sponser_id[]"
                                            aria-label="Default select example"
                                            class="js-example-basic-multiple form-control" data-val="true"
                                            multiple="multiple">
                                            @foreach ($sponsor as $sponsers)
                                                <option value="{{ $sponsers->id }}">{{ $sponsers->sponser_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="video_title" class="control-label mb-1">Video Title</label>
                                        <input id="video_title" placeholder="Enter Title" name="video_title" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="video_link" class="control-label mb-1">Video Link</label>
                                        <input id="video_link" placeholder="Enter Link" name="video_link" type="url"
                                            class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="presented_by" class="control-label mb-1">Presented By</label>
                                        <input id="presented_by" placeholder=" Enter presenter Name" name="presented_by"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="aad_video" class="control-label mb-1">Add Video</label>
                                        <input id="post_add_video" placeholder="" name="post_add_video" type="file"
                                            class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="news_description" class="control-label mb-1">Video
                                            Description</label>
                                        <textarea class="form-control" id="video_description" rows="3" name="video_description" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
