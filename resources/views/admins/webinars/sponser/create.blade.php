@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Event Sponsor</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('sponsors.store') }}" method="post" id="createsponser"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sponser_name" class="control-label mb-1"> Sponsor Name</label>
                                            <input id="sponser_name" placeholder="Enter Name" name="sponser_name"
                                                type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sponser_link" class="control-label mb-1">Sponsor Link</label>
                                            <input id="sponser_link" placeholder="https://" name="sponser_link"
                                                type="url" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sponser_image" class="control-label mb-1">Sponsor Image</label>
                                            <input id="sponser_image" placeholder="Enter Name" name="sponser_image"
                                                type="file" class="form-control" value="">
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
