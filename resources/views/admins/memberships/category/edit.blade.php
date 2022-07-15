@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Create Membership Plans</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center">Plan Detail</h3>
                            </div>
                            <hr>
                            <form action="{{ route('membership-category.update', $editCategory->id) }}" method="post"
                                id="plancategory">
                                @csrf
                                @method('PUT')
                                <div class="form-group text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Category Name</label>
                                            <input name="category_name" value="{{ $editCategory->category_name ?? '' }}"
                                                type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Category Status</label>
                                            <br>
                                            <input type="checkbox" name="status"
                                                {{ $editCategory->status == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                data-onstyle="outline-success" data-size="md" data-offstyle="outline-danger"
                                                data-on="<i class='fa fa-unlock'></i> Active"
                                                data-off="<i class='fa fa-lock'></i> Inactive">

                                        </div>
                                    </div>
                                </div>


                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                    <span id="payment-button-amount">Submit</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('adminscripts')
    <script></script>
@endsection
