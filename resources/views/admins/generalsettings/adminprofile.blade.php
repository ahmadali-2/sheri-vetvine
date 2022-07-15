@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Update Profile</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('generalsettings.store') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                    </ul>
                                </div>
                                <input type="hidden" value="{{ Auth::user()->id ?? ''}}" name="user_id">
                                <input type="hidden" value="{{ Auth::user()->type ?? ''}}" name="user_type">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false" value="{{ Auth::user()->name ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Email</label>
                                        <input id="email" name="email" type="email" value="{{ Auth::user()->email ?? ''}}"
                                        class="form-control cc-name valid" >
                                        </div>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-md-4">
                                  <div class="form-group">
                                  <label for="cc-name" class="control-label mb-1">Profile Image</label>
                                    <label for="cc-number" class="control-label mb-1"></label>
                                    <input id="profile_photo" name="profile_photo" accept='image/*' type="file"
                                        class="form-control cc-number identified visa" value=""
                                        data-val="true" data-val-required="Please enter your profile image"
                                        data-val-cc-number="Please enter your profile image" autocomplete="cc-number">
                                    <span class="help-block" data-valmsg-for="cc-number"
                                        data-valmsg-replace="true"></span>
                                </div>
                                  </div>
                              </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label class="label__wrapper required">Current Password</label>
                                        <input type="password" name="current_password" class="form-control input__box--wrapper">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="label__wrapper required">New Password</label>
                                        <input type="password" name="password" class="form-control input__box--wrapper" value="" >
                                            @error('password')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="label__wrapper required">Confirm Password</label>
                                        <input type="password" name="confirmpassword" class="form-control input__box--wrapper" value="" >
                                        @error('confirmpassword')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" class="btn btn-lg btn-info btn-block" value="Update Profile">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
