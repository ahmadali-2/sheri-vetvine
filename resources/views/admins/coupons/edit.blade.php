@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit Ad Campaign</strong>
                </div>

                <div id="pay-invoice">
                    <div class="card-body">
                        <form action="{{ route('coupon-code.update', $coupon->id) }}" method="post" id="createadscampaign"
                            novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                                        <input id="coupon_code" name="coupon_code" type="text" class="form-control"
                                            value="{{ $coupon->coupon_code }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group has-success ">
                                        <label for="start_date" class="control-label mb-1">Start Date</label>
                                        <input id="start_date" name="start_at" type="date" class="form-control"
                                            value="{{ $coupon->start_at }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="end_date" class="control-label mb-1">End Date</label>
                                        <input id="end_date" name="expired_at" type="date" class="form-control"
                                            value="{{ $coupon->expired_at }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group has-success">
                                        <label for="coupon_price" class="control-label mb-1">Coupon Price</label>
                                        <input id="coupon_price" name="amount" type="number" min="0"
                                            class="form-control" value="{{ $coupon->amount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group ">

                                        <label for="coupon_type" class="control-label mb-1">Coupon Type</label>
                                        <select name="coupon_type" id="coupon_type" class="form-control">
                                            <option value="">Select Coupon Type</option>
                                            <option value="percentage"
                                                {{ $coupon->coupon_type == 'percentage' ? 'selected' : '' }}>
                                                Percentage</option>
                                            <option value="fixed"
                                                {{ $coupon->coupon_type == 'fixed' ? 'selected' : '' }}>
                                                Fixed</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
