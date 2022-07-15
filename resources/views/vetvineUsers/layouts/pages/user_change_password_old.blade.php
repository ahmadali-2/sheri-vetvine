@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 field_none">
                <a href="#"><img src="{{ asset('frontend/img/add-img.png') }}">
                </a>
            </div>
            <div class="col-lg-6 change_password">
                <div class="content">
                    <h2>Change Your Password</h2>
                    <form action="{{ route('updateUserPassword') }}" method="POST" id="changeUserPasswordForm">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Enter Your Old Password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="password" name="current_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Enter Your New Password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="password" name="password">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Confirm Password</label>
                                </div>

                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="password" name="confirmpassword">
                                    </div>
                                </div>
                            </div>


                      </div>
                      <div class="btn_change text-center">
                        <button type="submit " class="btn btn-warning">Change Password</button>
                    </div>
                </form>
               </div>
          </div>
        <div class="col-lg-3">
            <a href="#"><img src="{{ asset('frontend/img/add-img.png') }}">
            </a>
        </div>
    </div>
    </div>
@endsection
