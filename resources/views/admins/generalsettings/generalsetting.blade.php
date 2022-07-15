@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">General Settings</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('storegeneralsetting') }}" method="post" id="generalsettingform"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $data->id ?? '' }}" name="setting_id">
                                <div class="row mt-2">
                                    <div class="col-sm-12 mx-auto border p-0">
                                        <p class="text-light text-uppercase text-center p-0 bg-dark m-0 heading_para py-2">
                                            <strong>Manage Social Information </strong>
                                        </p>
                                        <div class="col-sm-12 mt-2 p-4">
                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">Facebook</label>
                                                    <input type="url" name="facebook" placeholder="http://"
                                                        class="form-control input__box--wrapper"
                                                        value="{{ $data->facebook ?? '' }}">

                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">Twitter</label>
                                                    <input type="url" name="twitter" placeholder="http://"
                                                        class="form-control input__box--wrapper"
                                                        value="{{ $data->twitter ?? '' }}">

                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">LinkedIn</label>
                                                    <input type="url" name="instagram" placeholder="http://"
                                                        class="form-control input__box--wrapper"
                                                        value="{{ $data->instagram ?? '' }}">

                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">YouTube </label>
                                                    <input type="url" name="youtube" placeholder="http://"
                                                        class="form-control input__box--wrapper"
                                                        value="{{ $data->youtube ?? '' }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mx-auto border p-0">
                                        <p class="text-light text-uppercase text-center p-0 bg-dark m-0 heading_para py-2">
                                            <strong>Site Information</strong>
                                        </p>
                                        <div class="col-sm-12 mt-2 p-4">
                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper ">Vetvine Logo</label><span
                                                        class="imgsixeofspan"></span>
                                                    <div class="custom-file">
                                                        <input type="file" name="logo" value="{{ $data->logo ?? '' }}"
                                                            class="form-control input__box--wrapper custom-file-input"
                                                            accept="image/*">
                                                        <span class="custom-file-label" for="validatedCustomFile">{{ $data->logo ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">Email *</label>
                                                    <input type="email" name="email" value="{{ $data->email ?? '' }}"
                                                        class="form-control input__box--wrapper">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">Phone No. *</label>
                                                    <input type="text" name="phone_no" id="phone_no"
                                                        class="form-control input__box--wrapper"
                                                        value="{{ $data->phone_no ?? '' }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="label__wrapper required">Mission Statment</label>
                                                    <textarea type="text" name="mission_statement" value="{{ $data->mission_statement ?? '' }}"
                                                        class="form-control input__box--wrapper">{{ $data->mission_statement ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <input type="submit" class="btn btn-lg btn-info btn-block" value="Update Setting">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
