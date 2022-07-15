@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit news</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                            <form action="{{ route('news.update',$news->id)}}" method="post" id="newsform"
                                novalidate="novalidate" >
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="news_title" class="control-label mb-1">News Title</label>
                                            <input id="news_title" placeholder="Enter Title" name="news_title"
                                                type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                value="{{$news->news_title}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="news_link" class="control-label mb-1">News Link</label>
                                            <input id="news_link" placeholder="Enter Link" name="news_link"
                                                type="link" class="form-control" aria-required="true" aria-invalid="false"
                                                value="{{$news->news_link}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="news_description" class="control-label mb-1">News Description</label>
                                            <textarea class="form-control" id="news_description" rows="3" name="news_description" value="">{{$news->news_description}}</textarea>
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
