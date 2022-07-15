@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add New Advertisement</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('ads-manage.store') }}" method="post" id="createadsmanage"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ad_name" class="control-label mb-1">Advertisement Name</label>
                                            <input id="ad_name" placeholder="Enter Name" name="ad_name" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="banner_image_url" class="control-label mb-1">Advertisement
                                                Media Url</label>
                                            <input id="banner_image_url" placeholder="Enter Name" name="banner_image_url"
                                                type="url" placeholder="https://example.com" class="form-control"
                                                aria-required="true" aria-invalid="false" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=ad_media" class="control-label mb-1">Advertisement Media</label>
                                            <input id="ad_media" name="ad_media" accept='image/*' type="file"
                                                class="form-control cc-number identified visa" value="" data-val="true"
                                                data-val-required="Please enter your profile image"
                                                data-val-cc-number="Please enter your profile image"
                                                autocomplete="cc-number">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="campaign_id" class="control-label mb-1 form-select">Campaign</label>
                                            <select id="campaign_id" name="campaign_id" aria-label="Default select example"
                                                class="form-control cc-number identified visa" value="" data-val="true">
                                                <option selected value="">Open this select level</option>
                                                @foreach ($advertisement as $campaign)
                                                    <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
