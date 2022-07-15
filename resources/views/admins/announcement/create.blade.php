@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Announcement</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <form action="{{ route('announcements.store') }}" method="post" id="announcementsform"
                            novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="member_id" class="control-label mb-1 form-select">Member Level</label>
                                        <select class="js-example-basic-multiple form-control" name="member_id[]"
                                            data-val="true" multiple="multiple" style="width: 100%">
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="announcement_title" class="control-label mb-1">Announcement
                                            Title</label>
                                        <input id="announcement_title" placeholder="Enter Title" name="announcement_title"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="forum_description" class="control-label mb-1">Announcement
                                            Description</label>
                                        <textarea class="form-control ckeditor" id="Announcement_description" rows="3" name="description" value=""></textarea>
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
