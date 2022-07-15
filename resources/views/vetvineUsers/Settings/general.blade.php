@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
@php
    $user = Auth::user();
@endphp
<div class="dashboard-content-wrapper">
        <h4>General Settings</h4>
    <form method="post" action="{{ route('general.store')}}" id="generalfrm">
        @csrf
        <div class="row">
          <div class="col-sm-6 mt-4">
            <h6>Email Address</h6>
            <input type="text" placeholder="" required class="form-control" name="emailaddress" value=" {{ $user->email ?? '' }}"/>
          </div>
          <div class="col-sm-6 mt-4">
            <h6>Timezone</h6>
            <select class="form-control" name="timezone_id">
                <option value="">Select Time Zone</option>
                @foreach ($timezones as $timezone )
                    @if (isset($user->timezone_id) && $user->timezone_id == $timezone->id)
                        <option value="{{ $timezone->id }}" selected> {{ $timezone->timezone}}</option>
                    @else
                        <option value="{{ $timezone->id }}"> {{ $timezone->timezone}}</option>
                    @endif
                    @endforeach
            </select>
          </div>
          <div class="col-sm-6 mt-4">
            <h6>Locale</h6>
            <select class="form-control" name="locale_id">
                <option value="">Select Locale</option>
                @foreach ($languages as $lang)
                    @if(isset($user->locale_id) && $user->locale_id == $lang->id)
                        <option value="{{ $lang->id }}" selected>{{ $lang->locale_name }}</option>
                    @else
                        <option value="{{ $lang->id }}">{{ $lang->locale_name }}</option>
                    @endif
                @endforeach
        </select>
          </div>
          <div class="col-sm-12 mt-5">
            <button type="button" class="dashboard-btn mr-3">Save & Complete Later</button>
            <input type="submit" class="dashboard-btn" value="Save & Continue">
          </div>
        </div>
    </form>
      </div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\VetvineUsers\Settings\GeneralSettingRequest','#generalfrm') !!}
@endsection
