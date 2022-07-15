@extends('frontend.master')
@section('content')
<div class="edit-profile-header edit_profile_banner"></div>
    <div class="container">
        <div class="row heading_term">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <h3 class="mt-3">{{ isset($terms->page_title) ? $terms->page_title : 'N/A' }}</h3>
                </div>
            </div>
        </div>
        <div class="row term_policy">
            <div class="col-md-9">
                <div>
                    @if (empty($terms->page_desc))
                    <h5>No data found</h5>
                    @else
                    {!! $terms->page_desc ?? '' !!}
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('frontend\images\add-img.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection
